<?php // Echoo Dashboard ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Echoo Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/echoo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <style>
        :root {
            --color-cyan: #03ffff;
            --color-blue: #36b7ff;
            --color-magenta: #ff00ff;
        }
        .fade-in { animation: fadeIn 0.7s; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .tab-active { border-bottom: 2px solid var(--color-cyan); color: var(--color-cyan); }
        .tab-btn:hover { color: var(--color-magenta); }
        .post-card:hover { box-shadow: 0 4px 24px 0 var(--color-blue); transform: translateY(-2px) scale(1.01); transition: 0.2s; }
        .btn-main { background: var(--color-cyan); color: #222; }
        .btn-main:hover { background: var(--color-magenta); color: #fff; }
        .btn-secondary { background: var(--color-blue); color: #fff; }
        .btn-secondary:hover { background: var(--color-magenta); color: #fff; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <header class="flex items-center justify-between px-4 py-3 bg-white shadow-md sticky top-0 z-10">
        <div class="flex items-center gap-3">
            <img src="assets/echoo.png" alt="Echoo Logo" class="h-10 w-10">
            <span class="text-2xl font-bold tracking-tight" style="color:var(--color-cyan)">Echoo</span>
        </div>
        <div class="flex items-center gap-2">
            <button id="invite-btn" class="btn-main rounded px-3 py-1 text-sm font-semibold">Invite</button>
            <button id="logout-btn" class="btn-secondary rounded px-3 py-1 text-sm font-semibold">Logout</button>
        </div>
    </header>
    <main class="max-w-6xl mx-auto mt-6 fade-in">
        <nav class="flex gap-2 border-b mb-4">
            <button class="tab-btn tab-active px-4 py-2 font-semibold" data-tab="posts">Posts</button>
            <button class="tab-btn px-4 py-2 font-semibold" data-tab="calendar">Calendar</button>
            <button class="tab-btn px-4 py-2 font-semibold" data-tab="analytics">Analytics</button>
            <button class="tab-btn px-4 py-2 font-semibold" data-tab="inbox">Inbox</button>
            <button class="tab-btn px-4 py-2 font-semibold" data-tab="settings">Settings</button>
        </nav>
        <section id="tab-posts" class="tab-content fade-in">
            <div class="flex flex-wrap gap-4">
                <!-- JS: Post cards here -->
            </div>
            <div class="mt-6">
                <button id="new-post-btn" class="btn-main rounded px-4 py-2 font-semibold">+ New Post</button>
            </div>
        </section>
        <section id="tab-calendar" class="tab-content hidden fade-in">
            <div id="calendar"></div>
        </section>
        <section id="tab-analytics" class="tab-content hidden fade-in">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-1">
                    <canvas id="analytics-chart" height="180"></canvas>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold mb-2">Competitor Overview</h3>
                    <ul id="competitor-list" class="space-y-2">
                        <!-- JS: Dummy competitor data -->
                    </ul>
                </div>
            </div>
            <div class="mt-4 flex gap-2">
                <label>Platform:</label>
                <select id="analytics-platform" class="border rounded px-2 py-1">
                    <option value="all">All</option>
                    <option value="facebook">Facebook</option>
                    <option value="instagram">Instagram</option>
                    <option value="telegram">Telegram</option>
                </select>
                <label>Period:</label>
                <select id="analytics-period" class="border rounded px-2 py-1">
                    <option value="7">7 days</option>
                    <option value="30">30 days</option>
                    <option value="90">90 days</option>
                </select>
            </div>
        </section>
        <section id="tab-inbox" class="tab-content hidden fade-in">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-semibold">Inbox</h3>
                <button id="ai-sort-btn" class="btn-main rounded px-3 py-1 text-sm font-semibold">AI Sort</button>
            </div>
            <div id="inbox-feed" class="space-y-3">
                <!-- JS: Inbox messages -->
            </div>
        </section>
        <section id="tab-settings" class="tab-content hidden fade-in">
            <h3 class="font-semibold mb-2">Settings</h3>
            <div class="mb-2">Role: <span id="user-role">Owner</span> (dummy)</div>
            <div class="mb-2">Invite users, manage team, API keys, etc.</div>
        </section>
    </main>
    <div id="modal-bg" class="fixed inset-0 bg-black bg-opacity-40 z-30 hidden"></div>
    <div id="modal" class="fixed left-1/2 top-1/2 z-40 bg-white rounded shadow-lg p-6 min-w-[320px] max-w-[90vw] hidden" style="transform:translate(-50%,-50%)">
        <!-- JS: Modal content -->
    </div>
    <script src="assets/crypto-js.min.js"></script>
    <script src="assets/main.js"></script>
</body>
</html> 