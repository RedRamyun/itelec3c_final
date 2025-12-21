<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Election System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(to bottom right, #f0f9ff, #fff, #f0f9ff);
            min-height: 100vh;
            color: #333;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        @keyframes hover-lift {
            from { transform: translateY(0); }
            to { transform: translateY(-4px); }
        }

        /* Navigation */
        nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .nav-container {
            max-width: 80rem;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 5rem;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-logo {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(to bottom right, #2563eb, #1d4ed8);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
            position: relative;
        }

        .nav-logo svg {
            width: 1.75rem;
            height: 1.75rem;
            color: #fff;
        }

        .nav-pulse {
            position: absolute;
            top: -0.25rem;
            right: -0.25rem;
            width: 1rem;
            height: 1rem;
            background: #4ade80;
            border-radius: 50%;
            border: 2px solid #fff;
            animation: pulse 2s infinite;
        }

        .nav-title h1 {
            font-size: 1.375rem;
            font-weight: 700;
            background: linear-gradient(to right, #1e3a8a, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-title p {
            font-size: 0.75rem;
            color: #999;
        }

        .nav-status {
            display: none;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: #666;
        }

        .nav-status-dot {
            width: 0.5rem;
            height: 0.5rem;
            background: #4ade80;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @media (min-width: 768px) {
            .nav-status {
                display: flex;
            }
        }

        /* Main Section */
        main {
            position: relative;
            overflow: hidden;
        }

        .bg-pattern {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 50%, rgba(59, 130, 246, 0.05), transparent 70%);
            pointer-events: none;
        }

        .bg-blob-1 {
            position: absolute;
            top: 5rem;
            right: 5rem;
            width: 24rem;
            height: 24rem;
            background: rgba(191, 219, 254, 0.3);
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }

        .bg-blob-2 {
            position: absolute;
            bottom: 5rem;
            left: 5rem;
            width: 20rem;
            height: 20rem;
            background: rgba(221, 214, 254, 0.3);
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }

        .main-wrapper {
            max-width: 80rem;
            margin: 0 auto;
            padding: 0 1rem;
            padding-top: 5rem;
            position: relative;
            z-index: 10;
        }

        /* Hero Section */
        .hero-section {
            text-align: center;
            margin-bottom: 5rem;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .hero-badge svg {
            width: 1rem;
            height: 1rem;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            color: #111;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .hero-title-highlight {
            background: linear-gradient(to right, #2563eb, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #666;
            max-width: 48rem;
            margin: 0 auto 2.5rem;
            line-height: 1.6;
        }

        .hero-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            color: #fff;
            font-weight: 600;
            border-radius: 1.5rem;
            text-decoration: none;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .hero-button:hover {
            box-shadow: 0 20px 25px -5px rgba(37, 99, 235, 0.4);
            animation: hover-lift 0.3s ease forwards;
        }

        .hero-button svg {
            width: 1.25rem;
            height: 1.25rem;
            transition: transform 0.3s ease;
        }

        .hero-button:hover svg:last-child {
            transform: translateX(4px);
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            margin-bottom: 5rem;
        }

        @media (min-width: 768px) {
            .features-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 1.5rem;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }

        .feature-icon-green {
            background: linear-gradient(to bottom right, #4ade80, #22c55e);
        }

        .feature-icon-blue {
            background: linear-gradient(to bottom right, #60a5fa, #3b82f6);
        }

        .feature-icon-purple {
            background: linear-gradient(to bottom right, #c084fc, #a855f7);
        }

        .feature-icon svg {
            width: 1.75rem;
            height: 1.75rem;
            color: #fff;
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 0.75rem;
        }

        .feature-description {
            color: #666;
            font-size: 0.95rem;
        }

        /* Election Info Card */
        .election-card {
            background: linear-gradient(to right, #2563eb, #a855f7);
            border-radius: 2rem;
            padding: 2rem;
            color: #fff;
            text-align: center;
        }

        .election-title {
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .election-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
        }

        .election-info-grid {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            justify-content: center;
        }

        @media (min-width: 640px) {
            .election-info-grid {
                flex-direction: row;
                gap: 1rem;
            }
        }

        .election-info-box {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            border-radius: 0.75rem;
            padding: 1rem;
        }

        .election-info-date {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .election-info-label {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 0.25rem;
        }

        /* Footer */
        footer {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(8px);
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .footer-container {
            max-width: 80rem;
            margin: 0 auto;
            padding: 2rem 1rem;
            text-align: center;
        }

        .footer-text {
            color: #666;
            margin-bottom: 0.5rem;
        }

        .footer-subtext {
            font-size: 0.875rem;
            color: #999;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.25rem;
            }

            .election-title {
                font-size: 1.5rem;
            }

            .bg-blob-1, .bg-blob-2 {
                width: 12rem;
                height: 12rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <div class="nav-brand">
                <div class="nav-logo">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="nav-pulse"></div>
                </div>
                <div class="nav-title">
                    <h1>Student Election System</h1>
                    <p>Your Voice, Your Choice</p>
                </div>
            </div>
            <div class="nav-status">
                <div class="nav-status-dot"></div>
                <span>Election Status: Active</span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <!-- Background Elements -->
        <div class="bg-pattern"></div>
        <div class="bg-blob-1"></div>
        <div class="bg-blob-2"></div>

        <div class="main-wrapper">
            <!-- Hero Section -->
            <div class="hero-section">
                <div class="hero-badge">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Secure • Transparent • Fair</span>
                </div>

                <h1 class="hero-title">
                    Shape Your
                    <span class="hero-title-highlight">Future</span>
                </h1>

                <p class="hero-subtitle">
                    Participate in the democratic process. Your vote is your voice in building a better student community.
                </p>

                <a href="{{ route('voter.login') }}" class="hero-button">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                    Cast Your Vote
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>

            <!-- Features Grid -->
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon feature-icon-green">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Secure Voting</h3>
                    <p class="feature-description">State-of-the-art encryption ensures your vote remains private and tamper-proof.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon feature-icon-blue">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Real-time Results</h3>
                    <p class="feature-description">Watch election results unfold in real-time with transparent vote counting.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon feature-icon-purple">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Easy Access</h3>
                    <p class="feature-description">Vote from anywhere, anytime with our user-friendly platform.</p>
                </div>
            </div>

            <!-- Election Info Card -->
            <div class="election-card">
                <h2 class="election-title">Ready to Vote?</h2>
                <p class="election-subtitle">Login with your credentials to access the voting platform and make your voice heard.</p>
                <div class="election-info-grid">
                    <div class="election-info-box">
                        <div class="election-info-date">{{ now()->format('M j, Y') }}</div>
                        <div class="election-info-label">Election Date</div>
                    </div>
                    <div class="election-info-box">
                        <div class="election-info-date">8:00 AM - 5:00 PM</div>
                        <div class="election-info-label">Voting Hours</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <p class="footer-text">© {{ date('Y') }} Student Election System. All rights reserved.</p>
            <p class="footer-subtext">Empowering student voices through democratic participation.</p>
        </div>
    </footer>
</body>
</html>
