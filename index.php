<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Echoo – Social Growth Made Simple</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-cyan: #03ffff;
            --primary-blue: #36b7ff;
            --primary-magenta: #ff00ff;
            --dark-bg: #1a202c;
            --text-dark: #333;
            --text-light: #fff;
            --bg-light: #f7f7f7;
            --accent-bg: #e0f7fa; /* Light accent background */
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        header {
            background-color: var(--text-light);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 15px 0;
        }
        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header nav a {
            color: var(--text-dark);
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        header nav a:hover {
            background-color: var(--accent-bg);
            color: var(--primary-blue);
        }
        .hero-bg {
            background: linear-gradient(to right, var(--primary-cyan), var(--primary-blue), var(--primary-magenta));
            color: var(--text-light);
            padding: 100px 0;
            text-align: center;
        }
        .hero-bg h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        .hero-bg p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        .hero-bg .buttons a {
            background-color: rgba(255, 255, 255, 0.15);
            color: var(--text-light);
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            margin: 0 10px;
            border: 2px solid var(--text-light);
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .hero-bg .buttons a:hover {
            background-color: var(--text-light);
            color: var(--primary-blue);
            border-color: var(--text-light);
        }
        #features {
            padding: 80px 0;
            background-color: var(--bg-light);
        }
        #features .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: var(--primary-blue);
            font-size: 2.5rem;
            font-weight: bold;
        }
        #features .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Four columns on larger screens */
            gap: 30px;
        }
        #features .feature-item {
            background-color: var(--text-light);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }
        #features .feature-item:hover {
            transform: translateY(-5px);
        }
        #features .feature-item svg {
            height: 40px;
            width: 40px;
            margin-bottom: 20px;
            color: var(--primary-cyan);
        }
        #features .feature-item h3 {
            font-size: 1.5rem;
            color: var(--text-dark);
            margin-bottom: 10px;
        }
        #features .feature-item p {
            color: var(--text-dark);
            font-size: 1rem;
            line-height: 1.5;
        }
        #features .feature-item ul {
            list-style: none;
            padding: 0;
            text-align: left;
            margin-top: 15px;
        }
        #features .feature-item ul li::before {
            content: "\2022"; /* Bullet point */
            color: var(--primary-magenta);
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
        #supported-networks {
            background-color: var(--accent-bg);
            padding: 50px 0;
            text-align: center;
        }
        #supported-networks h2 {
            color: var(--primary-magenta);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
        }
        #supported-networks .marquee-container {
            overflow: hidden;
        }
        #supported-networks .marquee {
            display: flex;
            width: fit-content; /* This helps contain the duplicated content */
            animation: marquee 30s linear infinite; /* Increased duration for more logos */
            padding: 10px 0;
        }
        #supported-networks .marquee img {
            height: 50px;
            margin: 0 30px;
        }
        /* Adjusted keyframes for seamless loop */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); } /* Translate by half the total duplicated content width */
        }
        #real-results {
            padding: 80px 0;
            background-color: var(--text-light);
            text-align: center;
        }
        #real-results h2 {
            color: var(--primary-cyan);
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 50px;
        }
        #real-results .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }
        #real-results .result-item {
            background-color: var(--accent-bg);
            padding: 40px 20px;
            border-radius: 8px;
        }
        #real-results .result-item .number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }
        #real-results .result-item .label {
            font-size: 1.1rem;
            color: var(--text-dark);
        }
        #testimonials {
            padding: 80px 0;
            background-color: var(--bg-light);
            text-align: center;
        }
        #testimonials h2 {
            color: var(--primary-magenta);
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 50px;
        }
        #testimonials .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }
        #testimonials .testimonial-item {
            background-color: var(--text-light);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        #testimonials .testimonial-item p.quote {
            font-style: italic;
            color: var(--text-dark);
            margin-bottom: 15px;
        }
        #testimonials .testimonial-item p.author {
            color: #777;
            font-size: 0.9rem;
        }
        #pricing {
            padding: 80px 0;
            background-color: var(--text-light);
            text-align: center;
        }
        #pricing h2 {
            color: var(--primary-blue);
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 50px;
        }
        #pricing .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 900px;
            margin: 30px auto 0;
        }
        #pricing .plan {
            background-color: var(--bg-light);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        #pricing .plan h3 {
            font-size: 1.8rem;
            color: var(--primary-magenta);
            margin-bottom: 20px;
        }
        #pricing .plan .price {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-cyan);
            margin-bottom: 20px;
        }
        #pricing .plan ul {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }
        #pricing .plan ul li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        #pricing .plan ul li:last-child {
            border-bottom: none;
        }
        #pricing .plan .button {
            display: inline-block;
            background-color: var(--primary-blue);
            color: var(--text-light);
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        #pricing .plan .button:hover {
            background-color: #0288d1;
        }
        footer {
            background-color: var(--dark-bg);
            color: var(--text-light);
            text-align: center;
            padding: 30px 0;
            font-size: 0.9rem;
        }
        footer .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        footer nav {
            margin-top: 15px;
        }
        footer nav a {
            color: var(--primary-cyan);
            text-decoration: none;
            margin: 0 10px;
        }
        footer nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="font-sans">
    <header>
        <div class="container">
            <img src="assets/echoo.png" alt="Echoo Logo" class="h-20">
            <nav>
                <a href="#features">Features</a>
                <a href="#pricing">Pricing</a>
                <a href="auth.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</a>
                <a href="auth.php#register" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">Register</a>
            </nav>
        </div>
    </header>

    <section class="hero-bg">
        <div class="container">
            <h1 class="text-4xl font-bold mb-6">Social Growth Made Simple</h1>
            <p class="text-lg mb-8">Automate posts across multiple platforms and watch your engagement soar effortlessly.</p>
            <p class="text-md mb-8">Rated 4.8 on G2 • Used by 5,000+ teams • Starting at $69/mo</p>
            <div class="buttons">
                <a href="#demo" class="bg-indigo-500 hover:bg-indigo-600">Book Demo</a>
                <a href="#pricing" class="border-white hover:bg-white hover:text-indigo-500">View Pricing</a>
            </div>
        </div>
    </section>

    <section id="supported-networks">
        <div class="container">
            <h2>Supported Social Networks & Partners</h2>
            <div class="marquee-container">
                <div class="marquee">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2560px-2021_Facebook_icon.svg.png" alt="Facebook">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/198px-Instagram_logo_2016.svg.png" alt="Instagram">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/512px-Logo_of_Twitter.svg.png" alt="Twitter">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/LinkedIn_logo_initials.png/512px-LinkedIn_logo_initials.png" alt="LinkedIn">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/YouTube_full-color_icon_%282017%29.svg/512px-YouTube_full-color_icon_%282017%29.svg.png" alt="YouTube">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Pinterest-logo.png" alt="Pinterest">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/TikTok_logo.svg/512px-TikTok_logo.svg.png" alt="TikTok">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Google_My_Business_Logo.svg/512px-Google_My_Business_Logo.svg.png" alt="Google My Business">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Threads_%28app%29_logo.svg/512px-Threads_%28app%29_logo.svg.png" alt="Threads">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2560px-2021_Facebook_icon.svg.png" alt="Facebook">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/198px-Instagram_logo_2016.svg.png" alt="Instagram">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/512px-Logo_of_Twitter.svg.png" alt="Twitter">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/LinkedIn_logo_initials.png/512px-LinkedIn_logo_initials.png" alt="LinkedIn">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/YouTube_full-color_icon_%282017%29.svg/512px-YouTube_full-color_icon_%282017%29.svg.png" alt="YouTube">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Pinterest-logo.png" alt="Pinterest">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/TikTok_logo.svg/512px-TikTok_logo.svg.png" alt="TikTok">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Google_My_Business_Logo.svg/512px-Google_My_Business_Logo.svg.png" alt="Google My Business">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Threads_%28app%29_logo.svg/512px-Threads_%28app%29_logo.svg.png" alt="Threads">
                </div>
            </div>
        </div>
    </section>

    <section id="features">
        <div class="container">
            <h2 class="section-title">Powerful Features for Growth</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    <h3>Intelligent Scheduling</h3>
                    <p>AI-optimized posting for max engagement.</p>
                    <ul>
                        <li>Best-time AI</li>
                        <li>Bulk edit</li>
                        <li>Calendar drag-drop</li>
                    </ul>
                </div>
                <div class="feature-item">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" /></svg>
                    <h3>Unified Engagement</h3>
                    <p>Manage interactions from one dashboard.</p>
                    <ul>
                        <li>Central inbox</li>
                        <li>AI responses</li>
                        <li>Sentiment alerts</li>
                    </ul>
                </div>
                <div class="feature-item">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                    <h3>AI Analytics</h3>
                    <p>Insights for optimization.</p>
                    <ul>
                        <li>Real-time dashboards</li>
                        <li>Competitor benchmarking</li>
                        <li>Trend forecasting</li>
                    </ul>
                </div>
                <div class="feature-item">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M16 18l-4-4 4-4"/></svg>
                    <h3>AI Integration</h3>
                    <p>Generate posts, optimize hashtags.</p>
                    <ul>
                        <li>Content generator</li>
                        <li>Hashtag suggestions</li>
                        <li>Engagement scoring</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="real-results">
        <div class="container">
            <h2>Real Results</h2>
            <p class="mb-8">Users see 40% engagement increase.</p>
            <div class="results-grid">
                <div class="result-item">
                    <p class="number">5,000+</p>
                    <p class="label">Active Users</p>
                </div>
                <div class="result-item">
                    <p class="number">1M+</p>
                    <p class="label">Posts Scheduled</p>
                </div>
                <div class="result-item">
                    <p class="number">4.8/5</p>
                    <p class="label">User Rating</p>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials">
        <div class="container">
            <h2>User Testimonials</h2>
            <p class="mb-8">Hear from satisfied users.</p>
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <p class="quote">"Echoo transformed our strategy. AI scheduling saved hours, engagement up 55%."</p>
                    <p class="author">John Doe, Marketing Director</p>
                </div>
                <div class="testimonial-item">
                    <p class="quote">"Unified inbox is a lifesaver. Follower growth doubled in 3 months."</p>
                    <p class="author">Jane Smith, Business Owner</p>
                </div>
                <div class="testimonial-item">
                    <p class="quote">"AI content generator is amazing. Viral success multiple times."</p>
                    <p class="author">Alex Johnson, Content Strategist</p>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing">
        <div class="container">
            <h2>Choose Your Plan</h2>
            <p class="mb-8">Start free or go pro. No contracts.</p>
            <div class="pricing-grid">
                <div class="plan">
                    <h3>Free</h3>
                    <p class="price">0₴</p>
                    <p class="description">For starters.</p>
                    <ul>
                        <li>3 networks</li>
                        <li>10 posts/mo</li>
                        <li>Basic analytics</li>
                    </ul>
                    <a href="auth.php#register" class="button">Start Free</a>
                </div>
                <div class="plan">
                    <h3>Pro</h3>
                    <p class="price">99₴/mo</p>
                    <p class="description">For growth.</p>
                    <ul>
                        <li>Unlimited networks</li>
                        <li>Unlimited posts</li>
                        <li>Advanced AI</li>
                    </ul>
                    <a href="auth.php#register" class="button">Go Pro</a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <img src="assets/echoo-white.png" alt="Echoo Logo White" class="h-16 mb-3">
            <p>© 2025 Echoo. All rights reserved.</p>
            <nav>
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
            </nav>
        </div>
    </footer>
</body>
</html>