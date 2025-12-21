<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Results - Student Election System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #1a0f2e 0%, #0f172a 50%, #4a1d6f 100%);
            min-height: 100vh;
            color: #fff;
        }

        nav {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(32px);
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(34, 211, 238, 0.3);
        }

        .nav-container {
            max-width: 80rem;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 4rem;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-logo {
            width: 2.5rem;
            height: 2.5rem;
            background: linear-gradient(135deg, #06b6d4 0%, #2563eb 100%);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 25px -5px rgba(6, 182, 212, 0.5);
            transition: transform 0.3s ease;
        }

        .nav-logo:hover {
            transform: scale(1.1);
        }

        .nav-logo svg {
            width: 1.5rem;
            height: 1.5rem;
            color: #e0f2fe;
        }

        .nav-title h1 {
            font-size: 1.125rem;
            font-weight: 700;
            background: linear-gradient(to right, #67e8f9, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-title p {
            font-size: 0.75rem;
            color: rgba(34, 211, 238, 0.7);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-user {
            text-align: right;
            display: none;
        }

        .nav-user p:first-child {
            font-size: 0.875rem;
            font-weight: 600;
            color: #e0f2fe;
        }

        .nav-user p:last-child {
            font-size: 0.75rem;
            color: rgba(34, 211, 238, 0.7);
        }

        .logout-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(34, 211, 238, 0.8);
            background: none;
            border: none;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            color: #e0f2fe;
            background: rgba(34, 211, 238, 0.2);
        }

        .logout-btn svg {
            width: 1rem;
            height: 1rem;
        }

        @media (min-width: 640px) {
            .nav-user {
                display: block;
            }
        }

        .main-container {
            max-width: 80rem;
            margin: 0 auto;
            padding: 0 1rem;
            padding-top: 3rem;
            padding-bottom: 4rem;
        }

        .success-banner {
            background: linear-gradient(to right, rgba(5, 150, 105, 0.4), rgba(5, 150, 105, 0.5));
            border: 2px solid rgba(16, 185, 129, 0.6);
            border-radius: 1.5rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .success-icon {
            flex-shrink: 0;
            width: 2.5rem;
            height: 2.5rem;
            background: rgba(16, 185, 129, 0.3);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(16, 185, 129, 0.5);
        }

        .success-icon svg {
            width: 1.5rem;
            height: 1.5rem;
            color: rgba(16, 185, 129, 0.8);
        }

        .success-content h3 {
            color: rgba(16, 185, 129, 0.9);
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .success-content p {
            color: #a7f3d0;
            font-size: 0.875rem;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 4rem;
            height: 4rem;
            background: linear-gradient(135deg, #06b6d4 0%, #2563eb 100%);
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(6, 182, 212, 0.5);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .header-icon:hover {
            transform: scale(1.1);
        }

        .header-icon svg {
            width: 2rem;
            height: 2rem;
            color: #e0f2fe;
        }

        .page-title {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(to right, #cffafe, #93c5fd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.75rem;
        }

        .page-subtitle {
            font-size: 1.125rem;
            color: rgba(34, 211, 238, 0.8);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            margin-bottom: 4rem;
        }

        @media (min-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .stat-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            border-radius: 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
            padding: 2rem;
            border: 2px solid rgba(34, 211, 238, 0.4);
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 2rem;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            border-color: rgba(34, 211, 238, 0.8);
            box-shadow: 0 20px 25px -5px rgba(6, 182, 212, 0.3);
            transform: translateY(-4px);
        }

        .stat-content p:first-child {
            font-size: 0.875rem;
            font-weight: 600;
            color: rgba(34, 211, 238, 0.8);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 0.25rem;
            margin-top: 0.5rem;
        }

        .stat-description {
            font-size: 0.875rem;
            color: rgba(34, 211, 238, 0.6);
        }

        .stat-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1px solid;
        }

        .stat-icon svg {
            width: 2rem;
            height: 2rem;
        }

        .cyan-stat { border-color: rgba(34, 211, 238, 0.5); background: rgba(34, 211, 238, 0.3); }
        .cyan-stat svg { color: rgba(34, 211, 238, 0.8); }
        .cyan-text { color: rgba(34, 211, 238, 0.9); }

        .emerald-stat { border-color: rgba(16, 185, 129, 0.5); background: rgba(16, 185, 129, 0.3); }
        .emerald-stat svg { color: rgba(16, 185, 129, 0.8); }
        .emerald-text { color: rgba(16, 185, 129, 0.9); }

        .indigo-stat { border-color: rgba(79, 70, 229, 0.5); background: rgba(79, 70, 229, 0.3); }
        .indigo-stat svg { color: rgba(79, 70, 229, 0.8); }
        .indigo-text { color: rgba(79, 70, 229, 0.9); }

        .position-section {
            margin-bottom: 5rem;
        }

        .position-header {
            background: linear-gradient(to right, #06b6d4, #3b82f6, #4f46e5);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(6, 182, 212, 0.4);
            padding: 2rem;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .position-header:hover {
            box-shadow: 0 25px 50px -12px rgba(6, 182, 212, 0.6);
        }

        .position-header::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0.1;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .position-header-content {
            position: relative;
            z-index: 10;
        }

        .position-badges {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
        }

        .position-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3rem;
            height: 3rem;
            background: rgba(34, 211, 238, 0.3);
            border-radius: 0.5rem;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(34, 211, 238, 0.5);
            font-weight: 700;
            color: rgba(34, 211, 238, 0.9);
            font-size: 1.25rem;
        }

        .position-label {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: rgba(34, 211, 238, 0.2);
            border-radius: 9999px;
            color: #e0f2fe;
            font-size: 0.875rem;
            font-weight: 600;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(34, 211, 238, 0.4);
        }

        .position-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: rgba(34, 211, 238, 0.9);
            margin-bottom: 0.75rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .position-description {
            color: #f8fafc;
            font-size: 1.125rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .results-space {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .candidate-result {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            border-radius: 1.5rem;
            overflow: hidden;
            border: 2px solid rgba(34, 211, 238, 0.4);
            transition: all 0.3s ease;
        }

        .candidate-result.leading {
            border-color: rgba(250, 204, 21, 0.8);
            box-shadow: 0 25px 50px -12px rgba(250, 204, 21, 0.3);
        }

        .candidate-result:hover {
            box-shadow: 0 20px 25px -5px rgba(6, 182, 212, 0.3);
            transform: translateY(-2px);
        }

        .result-content {
            padding: 2rem;
            display: flex;
            align-items: flex-start;
            gap: 2rem;
        }

        .leading-badge {
            flex-shrink: 0;
            width: 3.5rem;
            height: 3.5rem;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 15px -3px rgba(250, 204, 21, 0.4);
            animation: bounce 2s infinite;
        }

        .leading-badge svg {
            width: 1.75rem;
            height: 1.75rem;
            color: #fff;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .candidate-photo {
            flex-shrink: 0;
            width: 5rem;
            height: 5rem;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(34, 211, 238, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .candidate-result:hover .candidate-photo {
            transform: scale(1.1);
        }

        .candidate-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .candidate-photo svg {
            width: 2.5rem;
            height: 2.5rem;
            color: #475569;
        }

        .candidate-info {
            flex: 1;
        }

        .candidate-info h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: rgba(34, 211, 238, 0.9);
            margin-bottom: 0.25rem;
        }

        .candidate-info p {
            font-size: 0.875rem;
            color: rgba(34, 211, 238, 0.6);
            margin-bottom: 0.5rem;
        }

        .candidate-info .leading-text {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: rgba(250, 204, 21, 0.3);
            color: rgba(250, 204, 21, 0.9);
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 0.5rem;
            border: 1px solid rgba(250, 204, 21, 0.5);
            margin-left: 0.5rem;
        }

        .vote-stats {
            display: flex;
            align-items: flex-end;
            gap: 2rem;
            text-align: right;
        }

        .vote-count {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .vote-number {
            font-size: 2.5rem;
            font-weight: 900;
            line-height: 1;
        }

        .leading .vote-number {
            color: rgba(250, 204, 21, 0.9);
        }

        .vote-label {
            font-size: 0.75rem;
            color: rgba(148, 163, 184, 0.8);
            margin-top: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .progress-bar-container {
            padding: 0 2rem 2rem;
        }

        .progress-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: rgba(34, 211, 238, 0.8);
            margin-bottom: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .progress-percentage {
            font-weight: 700;
        }

        .leading .progress-percentage {
            color: rgba(250, 204, 21, 0.9);
        }

        .progress-bar {
            width: 100%;
            height: 0.75rem;
            background: rgba(15, 23, 42, 0.8);
            border-radius: 9999px;
            overflow: hidden;
            border: 1px solid rgba(34, 211, 238, 0.2);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .progress-fill {
            height: 100%;
            border-radius: 9999px;
            background: linear-gradient(to right, #06b6d4, #0891b2);
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.5);
            transition: width 1s ease-out;
        }

        .leading .progress-fill {
            background: linear-gradient(to right, #fbbf24, #f59e0b);
            box-shadow: 0 0 10px rgba(250, 204, 21, 0.5);
        }

        .position-summary {
            background: linear-gradient(to right, rgba(8, 51, 68, 0.3), rgba(30, 58, 138, 0.3));
            border-left: 4px solid rgba(34, 211, 238, 0.8);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-top: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .summary-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: rgba(34, 211, 238, 0.8);
        }

        .summary-label svg {
            width: 1.5rem;
            height: 1.5rem;
            color: rgba(34, 211, 238, 0.8);
        }

        .summary-label strong {
            color: rgba(34, 211, 238, 0.9);
            font-weight: 700;
        }

        .summary-count {
            font-size: 1.875rem;
            font-weight: 900;
            color: rgba(34, 211, 238, 0.9);
        }

        .no-results {
            background: rgba(15, 23, 42, 0.5);
            border: 2px dashed rgba(34, 211, 238, 0.3);
            border-radius: 1.5rem;
            padding: 4rem 2rem;
            text-align: center;
        }

        .no-results svg {
            width: 5rem;
            height: 5rem;
            color: #475569;
            margin: 0 auto 1rem;
        }

        .no-results p:first-of-type {
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 0.5rem;
        }

        .no-results p:last-of-type {
            color: #94a3b8;
        }

        .no-positions {
            background: rgba(79, 70, 229, 0.4);
            border: 2px solid rgba(79, 70, 229, 0.6);
            border-radius: 1.5rem;
            padding: 3rem;
            text-align: center;
        }

        .no-positions-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 4rem;
            height: 4rem;
            background: rgba(79, 70, 229, 0.3);
            border-radius: 9999px;
            margin-bottom: 1.5rem;
        }

        .no-positions-icon svg {
            width: 2rem;
            height: 2rem;
            color: #c7d2fe;
        }

        .no-positions h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #e0e7ff;
            margin-bottom: 0.5rem;
        }

        .no-positions p {
            color: #a5b4fc;
        }

        .home-button-container {
            text-align: center;
            margin-top: 4rem;
        }

        .home-button {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(to right, #06b6d4, #2563eb);
            color: #e0f2fe;
            font-weight: 700;
            font-size: 1.125rem;
            padding: 1rem 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(6, 182, 212, 0.5);
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
        }

        .home-button:hover {
            background: linear-gradient(to right, #06a6d4, #1d4ed8);
            box-shadow: 0 25px 50px -12px rgba(6, 182, 212, 0.7);
            transform: scale(1.05);
        }

        .home-button svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.25rem;
            }

            .position-title {
                font-size: 1.5rem;
            }

            .result-content {
                flex-direction: column;
            }

            .vote-stats {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="nav-container">
            <div class="nav-brand">
                <div class="nav-logo">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                    </svg>
                </div>
                <div class="nav-title">
                    <h1>Election System</h1>
                    <p>Live Results</p>
                </div>
            </div>
            @if(session('voter_firstname'))
                <div class="nav-right">
                    <div class="nav-user">
                        <p>{{ session('voter_firstname') }} {{ session('voter_lastname') }}</p>
                        <p>Your vote has been counted</p>
                    </div>
                    <form method="POST" action="{{ route('voter.logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Success Message -->
        @if(session('success'))
            <div class="success-banner">
                <div class="success-icon">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                    </svg>
                </div>
                <div class="success-content">
                    <h3>Vote Submitted Successfully!</h3>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Page Header -->
        <div class="page-header">
            <div class="header-icon">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <h1 class="page-title">Election Results</h1>
            <p class="page-subtitle">Live results from the ongoing election. Results are updated in real-time.</p>
        </div>

        <!-- Statistics Summary -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-content">
                    <p>Total Voters</p>
                    <div class="stat-number cyan-text">{{ $totalVoters }}</div>
                    <p class="stat-description">Registered voters</p>
                </div>
                <div class="stat-icon cyan-stat">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <p>Votes Cast</p>
                    <div class="stat-number emerald-text">{{ $votedCount }}</div>
                    <p class="stat-description">Votes submitted</p>
                </div>
                <div class="stat-icon emerald-stat">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                    </svg>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-content">
                    <p>Turnout</p>
                    <div class="stat-number indigo-text">{{ $turnoutPercentage }}%</div>
                    <p class="stat-description">Voter participation</p>
                </div>
                <div class="stat-icon indigo-stat">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Results by Position -->
        @forelse($positions as $positionIndex => $position)
            <div class="position-section">
                <!-- Position Header -->
                <div class="position-header">
                    <div class="position-header-content">
                        <div class="position-badges">
                            <div class="position-number">{{ $positionIndex + 1 }}</div>
                            <span class="position-label">POSITION</span>
                        </div>
                        <h2 class="position-title">{{ $position->title }}</h2>
                        @if($position->description)
                            <p class="position-description">{{ $position->description }}</p>
                        @endif
                    </div>
                </div>

                @php
                    $candidates = $position->candidates;
                    $voteCounts = $position->voteCounts;
                    $totalVotesForPosition = $voteCounts->sum('vote_count');
                @endphp

                <!-- Results Cards -->
                @if($candidates->count() > 0)
                    <div class="results-space">
                        @foreach($candidates->sortByDesc(function($candidate) use ($voteCounts) {
                            return $voteCounts->where('candidate_id', $candidate->candidate_id)->first()?->vote_count ?? 0;
                        }) as $rank => $candidate)
                            @php
                                $voteCount = $voteCounts->where('candidate_id', $candidate->candidate_id)->first();
                                $votes = $voteCount ? $voteCount->vote_count : 0;
                                $percentage = $totalVotesForPosition > 0 ? round(($votes / $totalVotesForPosition) * 100, 1) : 0;
                                $isLeading = $rank === 0 && $votes > 0;
                            @endphp

                            <div class="candidate-result {{ $isLeading ? 'leading' : '' }}">
                                <div class="result-content">
                                    @if($isLeading)
                                        <div class="leading-badge">
                                            <svg fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </div>
                                    @endif

                                    <!-- Candidate Photo -->
                                    <div class="candidate-photo">
                                        @if($candidate->imagepath)
                                            <img src="{{ asset('storage/' . $candidate->imagepath) }}" alt="{{ $candidate->firstname }} {{ $candidate->lastname }}">
                                        @else
                                            <svg fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                            </svg>
                                        @endif
                                    </div>

                                    <div class="candidate-info">
                                        <h3>
                                            {{ $candidate->firstname }} {{ $candidate->lastname }}
                                            @if($isLeading)
                                                <span class="leading-text">Leading</span>
                                            @endif
                                        </h3>
                                        <p>{{ $position->title }}</p>
                                        @if($candidate->description)
                                            <p style="margin-top: 0.5rem; color: rgba(34, 211, 238, 0.7); overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $candidate->description }}</p>
                                        @endif
                                    </div>

                                    <div class="vote-stats">
                                        <div class="vote-count">
                                            <div class="vote-number{{ $isLeading ? ' leading' : '' }}">{{ $votes }}</div>
                                            <p class="vote-label">{{ $votes === 1 ? 'vote' : 'votes' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Vote Percentage Bar -->
                                <div class="progress-bar-container">
                                    <div class="progress-label">
                                        <span>Vote Share</span>
                                        <span class="progress-percentage{{ $isLeading ? ' leading' : '' }}">{{ $percentage }}%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: {{ $percentage }}%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Position Summary -->
                    <div class="position-summary">
                        <div class="summary-label">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            <span>Total Votes for <strong>{{ $position->title }}</strong>:</span>
                        </div>
                        <span class="summary-count">{{ $totalVotesForPosition }}</span>
                    </div>
                @else
                    <div class="no-results">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <p>No candidates for this position</p>
                        <p>Results will appear here once votes are cast</p>
                    </div>
                @endif
            </div>
        @empty
            <div class="no-positions">
                <div class="no-positions-icon">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                </div>
                <h3>No Results Available</h3>
                <p>No positions or results are available yet. Please check back later.</p>
            </div>
        @endforelse

        <!-- Back to Home Button -->
        <div class="home-button-container">
            <a href="{{ route('welcome') }}" class="home-button">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Back to Home
            </a>
        </div>
    </div>
</body>
</html>
