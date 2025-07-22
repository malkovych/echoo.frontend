// Echoo Dashboard Main JS
const API_URL = 'https://1533-178-136-41-113.ngrok-free.app';

// ========== AUTH/JWT ==========
function verifyJWT() {
    const jwt = localStorage.getItem('jwt');
    if (!jwt) {
        window.location.href = 'auth.php';
        return;
    }
    fetch(API_URL + '/api/verify', {
        headers: { 'Authorization': 'Bearer ' + jwt }
    })
    .then(r => r.json())
    .then(data => {
        if (!data.email) {
            localStorage.removeItem('jwt');
            window.location.href = 'auth.php';
        }
    })
    .catch(() => {
        localStorage.removeItem('jwt');
        window.location.href = 'auth.php';
    });
}
verifyJWT();

// ========== TAB SWITCHING ==========
const tabBtns = document.querySelectorAll('.tab-btn');
const tabContents = document.querySelectorAll('.tab-content');
tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        tabBtns.forEach(b => b.classList.remove('tab-active'));
        btn.classList.add('tab-active');
        tabContents.forEach(tc => tc.classList.add('hidden'));
        document.getElementById('tab-' + btn.dataset.tab).classList.remove('hidden');
    });
});

// ========== LOGOUT ==========
const logoutBtn = document.getElementById('logout-btn');
if (logoutBtn) {
    logoutBtn.onclick = function() {
        localStorage.removeItem('jwt');
        window.location.href = 'auth.php';
    };
}

// ========== INVITE (DUMMY) ==========
document.getElementById('invite-btn').onclick = function() {
    showModal('<h2 class="font-bold mb-2">Invite User</h2><input type="email" placeholder="Email" class="border rounded px-2 py-1 w-full mb-2"><button class="btn-main rounded px-4 py-2 w-full">Send Invite (dummy)</button>');
};

// ========== POSTS TAB ==========
const postsContainer = document.querySelector('#tab-posts .flex.flex-wrap');
const postWorkflow = ['Draft', 'Review', 'Approve', 'Schedule'];
let posts = [];

function fetchPosts() {
    const jwt = localStorage.getItem('jwt');
    fetch(API_URL + '/api/posts', {
        headers: { 'Authorization': 'Bearer ' + jwt }
    })
    .then(r => r.json())
    .then(data => {
        posts = data.posts || [];
        renderPosts();
    })
    .catch(() => {
        posts = [];
        renderPosts();
    });
}
function renderPosts() {
    postsContainer.innerHTML = '';
    if (!posts.length) {
        postsContainer.innerHTML = '<div class="text-gray-400">No posts yet.</div>';
        return;
    }
    posts.forEach(post => {
        const card = document.createElement('div');
        card.className = 'post-card bg-white rounded shadow p-4 w-80 flex flex-col gap-2 fade-in';
        card.innerHTML = `
            <div class="flex gap-2 items-center">
                <span class="font-semibold">${post.platform || 'All'}</span>
                <span class="text-xs text-gray-400 ml-auto">${post.status || 'Draft'}</span>
            </div>
            <div class="rounded bg-gray-100 p-2 min-h-[60px]">${post.text ? post.text.replace(/\n/g, '<br>') : '<span class="text-gray-400">No content</span>'}</div>
            ${post.image ? `<img src="${post.image}" class="rounded w-full h-32 object-cover">` : ''}
            <div class="flex gap-2 mt-2">
                ${postWorkflow.map(st => `<button class="btn-main rounded px-2 py-1 text-xs ${post.status===st?'opacity-70':''}" onclick="updatePostStatus('${post._id}','${st}')">${st}</button>`).join('')}
            </div>
            <div class="mt-2">
                <button class="btn-secondary rounded px-2 py-1 text-xs" onclick="showComments('${post._id}')">Comments</button>
            </div>
        `;
        postsContainer.appendChild(card);
    });
}
window.updatePostStatus = function(id, status) {
    const jwt = localStorage.getItem('jwt');
    fetch(API_URL + '/api/posts', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'Authorization': 'Bearer ' + jwt },
        body: JSON.stringify({ _id: id, status })
    }).then(() => fetchPosts());
};
window.showComments = function(id) {
    showModal('<h2 class="font-bold mb-2">Comments (dummy)</h2><div class="mb-2">Collaborate with your team here.</div><textarea class="border rounded w-full mb-2" rows="3" placeholder="Add a comment..."></textarea><button class="btn-main rounded px-4 py-2 w-full">Send (dummy)</button>');
};

document.getElementById('new-post-btn').onclick = function() {
    showModal(`<h2 class="font-bold mb-2">New Post</h2>
        <form id="new-post-form">
            <input type="text" name="text" class="border rounded px-2 py-1 w-full mb-2" placeholder="Text" required>
            <input type="text" name="image" class="border rounded px-2 py-1 w-full mb-2" placeholder="Image URL (optional)">
            <select name="platform" class="border rounded px-2 py-1 w-full mb-2">
                <option value="facebook">Facebook</option>
                <option value="instagram">Instagram</option>
                <option value="telegram">Telegram</option>
            </select>
            <button class="btn-main rounded px-4 py-2 w-full">Create</button>
        </form>`);
    setTimeout(() => {
        document.getElementById('new-post-form').onsubmit = function(e) {
            e.preventDefault();
            const jwt = localStorage.getItem('jwt');
            const fd = new FormData(this);
            fetch(API_URL + '/api/posts', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Authorization': 'Bearer ' + jwt },
                body: JSON.stringify({
                    text: fd.get('text'),
                    image: fd.get('image'),
                    platform: fd.get('platform'),
                    status: 'Draft'
                })
            }).then(() => {
                closeModal();
                fetchPosts();
            });
        };
    }, 100);
};

// ========== CALENDAR TAB ==========
let calendar;
function renderCalendar() {
    const calendarEl = document.getElementById('calendar');
    if (!calendarEl) return;
    if (calendar) calendar.destroy();
    calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 600,
        events: posts.map(post => ({
            id: post._id,
            title: post.text?.slice(0,30) || 'Post',
            start: post.date || new Date(),
            color: post.platform==='facebook'?'#36b7ff':post.platform==='instagram'?'#ff00ff':'#03ffff',
            extendedProps: { post }
        })),
        editable: true,
        eventDrop: function(info) {
            const jwt = localStorage.getItem('jwt');
            fetch(API_URL + '/api/posts', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Authorization': 'Bearer ' + jwt },
                body: JSON.stringify({ _id: info.event.id, date: info.event.startStr })
            }).then(() => fetchPosts());
        },
        eventClick: function(info) {
            showModal(`<h2 class="font-bold mb-2">${info.event.title}</h2><div>${info.event.extendedProps.post.text}</div>`);
        }
    });
    calendar.render();
}

// ========== ANALYTICS TAB ==========
let analyticsChart;
function renderAnalytics() {
    const ctx = document.getElementById('analytics-chart');
    if (!ctx) return;
    fetch(API_URL + '/api/analytics', {
        headers: { 'Authorization': 'Bearer ' + localStorage.getItem('jwt') }
    })
    .then(r => r.json())
    .then(data => {
        if (analyticsChart) analyticsChart.destroy();
        analyticsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels || ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
                datasets: [{
                    label: 'Posts',
                    data: data.values || [2,4,3,5,6,2,1],
                    borderColor: '#03ffff',
                    backgroundColor: 'rgba(3,255,255,0.2)',
                    tension: 0.3
                }]
            },
            options: { responsive: true, plugins: { legend: { display: false } } }
        });
        // Competitor dummy
        document.getElementById('competitor-list').innerHTML = `
            <li>Planable: 120 posts/mo</li>
            <li>Buffer: 90 posts/mo</li>
            <li>Echoo: 100 posts/mo</li>
        `;
    });
}
document.getElementById('analytics-platform').onchange = renderAnalytics;
document.getElementById('analytics-period').onchange = renderAnalytics;

// ========== INBOX TAB ==========
function renderInbox() {
    const inboxFeed = document.getElementById('inbox-feed');
    if (!inboxFeed) return;
    fetch(API_URL + '/api/inbox', {
        headers: { 'Authorization': 'Bearer ' + localStorage.getItem('jwt') }
    })
    .then(r => r.json())
    .then(data => {
        inboxFeed.innerHTML = '';
        (data.messages||[{from:'User',text:'Welcome to Echoo!',platform:'facebook'}]).forEach(msg => {
            const div = document.createElement('div');
            div.className = 'bg-white rounded shadow p-3 flex gap-2 items-center';
            div.innerHTML = `<span class="font-bold" style="color:var(--color-blue)">${msg.platform}</span><span>${msg.text}</span><span class="ml-auto text-xs text-gray-400">${msg.from}</span><select class="ml-2 border rounded px-1 py-0.5"><option>Assign</option><option>Me</option><option>Team</option></select>`;
            inboxFeed.appendChild(div);
        });
    });
}
document.getElementById('ai-sort-btn').onclick = function() {
    showModal('<h2 class="font-bold mb-2">AI Sort (dummy)</h2><div>AI sorted your inbox (demo).</div>');
};

// ========== MODAL ==========
function showModal(html) {
    document.getElementById('modal-bg').classList.remove('hidden');
    const modal = document.getElementById('modal');
    modal.innerHTML = html;
    modal.classList.remove('hidden');
}
function closeModal() {
    document.getElementById('modal-bg').classList.add('hidden');
    document.getElementById('modal').classList.add('hidden');
}
document.getElementById('modal-bg').onclick = closeModal;

// ========== POLLING (REAL-TIME DEMO) ==========
setInterval(() => {
    if (document.querySelector('#tab-posts').classList.contains('hidden')) return;
    fetchPosts();
}, 10000);

// ========== INIT ==========
function initEchooDashboard() {
    fetchPosts();
    renderAnalytics();
    renderInbox();
    setTimeout(renderCalendar, 500); // Wait for posts
}
initEchooDashboard();

tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        if (btn.dataset.tab === 'calendar') setTimeout(renderCalendar, 100);
        if (btn.dataset.tab === 'analytics') setTimeout(renderAnalytics, 100);
        if (btn.dataset.tab === 'inbox') setTimeout(renderInbox, 100);
    });
}); 