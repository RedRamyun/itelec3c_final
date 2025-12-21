<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Candidates - Student Election System</title>
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

        /* Navbar Styles */
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
            transform-origin: center;
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
            font-size: 1.25rem;
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

        /* Main Content Styles */
        .main-container {
            max-width: 80rem;
            margin: 0 auto;
            padding: 0 1rem;
            padding-top: 4rem;
            padding-bottom: 5rem;
        }

        /* Hero Section */
        .hero-section {
            margin-bottom: 5rem;
            text-align: center;
        }

        .hero-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 4rem;
            height: 4rem;
            background: linear-gradient(135deg, #06b6d4 0%, #2563eb 100%);
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(6, 182, 212, 0.5);
            margin-bottom: 1.5rem;
            transform-origin: center;
            transition: transform 0.3s ease;
        }

        .hero-icon:hover {
            transform: scale(1.1);
        }

        .hero-icon svg {
            width: 2rem;
            height: 2rem;
            color: #e0f2fe;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(to right, #cffafe, #93c5fd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.125rem;
            color: rgba(34, 211, 238, 0.8);
            max-width: 28rem;
            margin: 0 auto;
            line-height: 1.75;
        }

        @media (min-width: 640px) {
            .hero-title {
                font-size: 3.75rem;
            }
        }

        /* Position Section */
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
            transition: all 0.5s ease;
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

        .position-badge-group {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .position-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            background: rgba(34, 211, 238, 0.3);
            border-radius: 0.5rem;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(34, 211, 238, 0.5);
            font-weight: 700;
            color: rgba(34, 211, 238, 0.9);
            font-size: 1.125rem;
        }

        .position-label {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: rgba(34, 211, 238, 0.2);
            border-radius: 9999px;
            color: #e0f2fe;
            font-size: 0.875rem;
            font-weight: 600;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(34, 211, 238, 0.4);
        }

        .position-name {
            font-size: 2.25rem;
            font-weight: 700;
            color: rgba(34, 211, 238, 0.9);
            margin-bottom: 0.75rem;
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .position-description {
            color: #f8fafc;
            font-size: 1.125rem;
            line-height: 1.75;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Candidates Grid */
        .candidates-wrapper {
            background-color: #fef08a;
            border-radius: 1rem;
            padding: 2rem;
        }

        .candidates-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        @media (min-width: 640px) {
            .candidates-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
            }
        }

        @media (min-width: 1024px) {
            .candidates-grid {
                grid-template-columns: repeat(5, 1fr);
                gap: 2rem;
            }
        }

        .candidate-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            border: 2px solid #1e40af;
            transform-origin: center;
        }

        .candidate-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5);
            transform: scale(1.05);
        }

        .candidate-photo-container {
            padding: 1.5rem 1rem;
            display: flex;
            justify-content: center;
        }

        .candidate-photo {
            width: 8rem;
            height: 8rem;
            border-radius: 9999px;
            overflow: hidden;
            border: 4px solid #06b6d4;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
            background-color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .candidate-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .candidate-photo svg {
            width: 5rem;
            height: 5rem;
            color: #64748b;
        }

        .candidate-info {
            padding: 1rem;
            text-align: center;
        }

        .candidate-name {
            font-size: 1.125rem;
            font-weight: 700;
            color: rgba(34, 211, 238, 0.9);
            margin-bottom: 0.5rem;
        }

        .candidate-position {
            color: #e0f2fe;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .candidate-party {
            color: #cbd5e1;
            font-size: 0.75rem;
            margin-top: 0.5rem;
        }

        /* Empty State */
        .empty-state {
            background: rgba(15, 23, 42, 0.5);
            border: 2px dashed rgba(34, 211, 238, 0.3);
            border-radius: 1.5rem;
            padding: 4rem 1rem;
            text-align: center;
        }

        .empty-state svg {
            width: 5rem;
            height: 5rem;
            color: #475569;
            margin: 0 auto 1rem;
        }

        .empty-state-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 0.5rem;
        }

        .empty-state-text {
            color: #94a3b8;
        }

        /* No Positions */
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

        .no-positions-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #e0e7ff;
            margin-bottom: 0.5rem;
        }

        .no-positions-text {
            color: #a5b4fc;
        }

        /* Vote Button */
        .vote-section {
            margin-top: 5rem;
            display: flex;
            justify-content: center;
        }

        .vote-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(to right, #06b6d4, #2563eb);
            color: #e0f2fe;
            font-weight: 700;
            font-size: 1.125rem;
            padding: 1.25rem 3.5rem;
            border-radius: 1rem;
            border: none;
            box-shadow: 0 25px 50px -12px rgba(6, 182, 212, 0.5);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            transform: translateY(0);
        }

        .vote-btn:hover {
            background: linear-gradient(to right, #06a6d4, #1d4ed8);
            box-shadow: 0 25px 50px -12px rgba(6, 182, 212, 0.7);
            transform: translateY(-4px);
        }

        .vote-btn:active {
            transform: translateY(0);
            background: linear-gradient(to right, #0891b2, #1e40af);
        }

        .vote-btn svg {
            width: 1.5rem;
            height: 1.5rem;
            transition: transform 0.3s ease;
        }

        .vote-btn:hover svg {
            transform: translateX(0.5rem);
        }

        @media (max-width: 768px) {
            .nav-user {
                display: none;
            }

            .hero-title {
                font-size: 2.25rem;
            }

            .position-name {
                font-size: 1.5rem;
            }

            .candidates-wrapper {
                padding: 1rem;
            }

            .candidates-grid {
                gap: 1rem;
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
                    <p>Candidate Preview</p>
                </div>
            </div>
            <div class="nav-right">
                <div class="nav-user">
                    <p>{{ session('voter_firstname') }} {{ session('voter_lastname') }}</p>
                    <p>Registered Voter</p>
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
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="hero-icon">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                </svg>
            </div>
            <h1 class="hero-title">Meet the Candidates</h1>
            <p class="hero-subtitle">Review all candidates for each position. Get to know them before you cast your vote.</p>
        </div>

        <!-- Positions and Candidates -->
        @forelse($positions as $index => $position)
            <div class="position-section">
                <!-- Position Header -->
                <div class="position-header">
                    <div class="position-header-content">
                        <div class="position-badge-group">
                            <div class="position-number">{{ $index + 1 }}</div>
                            <span class="position-label">POSITION</span>
                        </div>
                        <h2 class="position-name">{{ $position->position_name }}</h2>
                        @if($position->description)
                            <p class="position-description">{{ $position->description }}</p>
                        @endif
                    </div>
                </div>

                <!-- Candidates Grid -->
                @if($position->candidates->count() > 0)
                    <div class="candidates-wrapper">
                        <div class="candidates-grid">
                            @foreach($position->candidates as $candidate)
                                <div class="candidate-card">
                                    <div class="candidate-photo-container">
                                        <div class="candidate-photo">
                                            @if($candidate->imagepath)
                                                <img src="{{ asset('storage/' . $candidate->imagepath) }}" alt="{{ $candidate->candidate_name }}">
                                            @else
                                                <svg fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                                </svg>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="candidate-info">
                                        <h3 class="candidate-name">{{ $candidate->candidate_name }}</h3>
                                        <p class="candidate-position">{{ $position->position_name }}</p>
                                        @if($candidate->party_affiliation)
                                            <p class="candidate-party">{{ $candidate->party_affiliation }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="empty-state">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <p class="empty-state-title">No candidates for this position yet</p>
                        <p class="empty-state-text">Check back soon for updates</p>
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
                <h3 class="no-positions-title">No Positions Available</h3>
                <p class="no-positions-text">No positions or candidates available at this time. Please check back later.</p>
            </div>
        @endforelse

        <!-- Vote Button -->
        @if($positions->count() > 0)
            <div class="vote-section">
                <a href="{{ route('voter.voting') }}" class="vote-btn">
                    <span>Ready to Vote</span>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</body>
</html>
    <!-- Premium Navbar -->
    <nav class="bg-slate-900/80 backdrop-blur-2xl sticky top-0 z-50 shadow-lg border-b border-cyan-500/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/50 transform hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-cyan-200" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Election System</h1>
                        <p class="text-xs text-cyan-300/70">Candidate Preview</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-semibold text-cyan-200">{{ session('voter_firstname') }} {{ session('voter_lastname') }}</p>
                        <p class="text-xs text-cyan-400/70">Registered Voter</p>
                    </div>
                    <form method="POST" action="{{ route('voter.logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-2 text-cyan-300 hover:text-cyan-100 font-medium text-sm px-4 py-2 rounded-lg hover:bg-cyan-500/20 transition-all duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
        <!-- Hero Section -->
        <div class="mb-16 sm:mb-20 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl shadow-2xl shadow-cyan-500/50 mb-6 mx-auto transform hover:scale-110 transition-transform duration-300">
                <svg class="w-8 h-8 text-cyan-100" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                </svg>
            </div>
            <h1 class="text-5xl sm:text-6xl font-extrabold bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent mb-4">Meet the Candidates</h1>
            <p class="text-lg sm:text-xl text-cyan-200/80 max-w-2xl mx-auto leading-relaxed">Review all candidates for each position. Get to know them before you cast your vote.</p>
        </div>

        <!-- Positions and Candidates -->
        @forelse($positions as $index => $position)
            <div class="mb-20">
                <!-- Position Header Card -->
<div class="bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-700 rounded-3xl shadow-2xl shadow-cyan-500/40 px-8 py-12 mb-10 relative overflow-hidden group hover:shadow-3xl hover:shadow-cyan-500/60 transition-all duration-500">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="inline-flex items-center justify-center w-10 h-10 bg-cyan-400/30 rounded-lg backdrop-blur-sm border border-cyan-300/50">
                            <span class="font-bold text-cyan-300 text-lg">{{ $index + 1 }}</span>
                        </div>
                        <span class="inline-block px-3 py-1 bg-cyan-400/20 rounded-full text-cyan-200 text-sm font-semibold backdrop-blur-sm border border-cyan-300/40">POSITION</span>
                    </div>
                    <h2 class="text-4xl font-bold text-cyan-300 mb-3 drop-shadow-lg">{{ $position->position_name }}</h2>
                    @if($position->description)
                        <p class="text-cyan-50 text-lg leading-relaxed drop-shadow-md">{{ $position->description }}</p>
                        @endif
                    </div>
                </div>

                <!-- Candidates Grid -->
                @if($position->candidates->count() > 0)
                    <div class="bg-yellow-100 rounded-2xl p-8 sm:p-12">
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6 sm:gap-8">
                            @foreach($position->candidates as $candidate)
                                <div class="bg-gradient-to-br from-slate-900 to-blue-900 rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 border-2 border-blue-800">
                                    <!-- Circular Photo Container -->
                                    <div class="pt-6 px-4 flex justify-center">
                                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-cyan-400 shadow-lg bg-slate-700 flex items-center justify-center flex-shrink-0">
                                            @if($candidate->imagepath)
                                                <img src="{{ asset('storage/' . $candidate->imagepath) }}" alt="{{ $candidate->candidate_name }}" class="w-full h-full object-cover">
                                            @else
                                                <svg class="w-20 h-20 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                                </svg>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Candidate Info -->
                                    <div class="p-4 text-center">
                                        <h3 class="text-lg font-bold text-cyan-300 mb-2">{{ $candidate->candidate_name }}</h3>
                                        <p class="text-cyan-200 font-semibold text-sm">{{ $position->position_name }}</p>
                                        @if($candidate->party_affiliation)
                                            <p class="text-slate-300 text-xs mt-2">{{ $candidate->party_affiliation }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="bg-slate-800/50 border-2 border-dashed border-cyan-400/30 rounded-3xl p-16 text-center">
                        <svg class="w-20 h-20 text-slate-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="text-slate-300 font-semibold text-lg">No candidates for this position yet</p>
                        <p class="text-slate-400 mt-2">Check back soon for updates</p>
                    </div>
                @endif
            </div>
        @empty
            <div class="bg-indigo-900/40 border-2 border-indigo-500/60 rounded-3xl p-12 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-500/30 rounded-full mb-6">
                    <svg class="w-8 h-8 text-indigo-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-indigo-200 mb-2">No Positions Available</h3>
                <p class="text-indigo-300">No positions or candidates available at this time. Please check back later.</p>
            </div>
        @endforelse

        <!-- Proceed to Voting Button -->
        @if($positions->count() > 0)
            <div class="mt-16 sm:mt-20 flex justify-center">
                <a href="{{ route('voter.voting') }}" class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 active:from-cyan-700 active:to-blue-700 text-cyan-100 font-bold text-lg px-12 sm:px-14 py-5 sm:py-6 rounded-2xl shadow-2xl shadow-cyan-500/50 hover:shadow-3xl hover:shadow-cyan-500/70 transform hover:-translate-y-1 active:translate-y-0 transition-all duration-300">
                    <span>Ready to Vote</span>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</body>
</html>
