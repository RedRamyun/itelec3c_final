<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cast Your Vote - Student Election System</title>
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
            max-width: 56rem;
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

        @media (min-width: 640px) {
            .nav-user {
                display: block;
            }
        }

        .main-container {
            max-width: 56rem;
            margin: 0 auto;
            padding: 0 1rem;
            padding-top: 3rem;
            padding-bottom: 4rem;
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

        .instructions-card {
            background: linear-gradient(to right, rgba(8, 51, 68, 0.4), rgba(30, 58, 138, 0.4));
            border: 2px solid rgba(34, 211, 238, 0.6);
            border-radius: 1.5rem;
            padding: 1.5rem;
            margin-bottom: 2.5rem;
            backdrop-filter: blur(12px);
            display: flex;
            gap: 1rem;
        }

        .instructions-icon {
            flex-shrink: 0;
            width: 1.75rem;
            height: 1.75rem;
            color: rgba(34, 211, 238, 0.8);
        }

        .instructions-content h3 {
            font-weight: 700;
            color: rgba(34, 211, 238, 0.9);
            font-size: 1.125rem;
            margin-bottom: 0.5rem;
        }

        .instructions-content p {
            color: #e0f2fe;
            font-size: 0.875rem;
            line-height: 1.6;
        }

        .error-card {
            background: linear-gradient(to right, rgba(127, 29, 29, 0.4), rgba(127, 29, 29, 0.4));
            border: 2px solid rgba(239, 68, 68, 0.6);
            border-radius: 1.5rem;
            padding: 1.5rem;
            margin-bottom: 2.5rem;
            backdrop-filter: blur(12px);
            display: flex;
            gap: 1rem;
        }

        .error-icon {
            flex-shrink: 0;
            width: 1.5rem;
            height: 1.5rem;
            color: rgba(248, 113, 113, 0.8);
        }

        .error-content h3 {
            font-weight: 700;
            color: rgba(248, 113, 113, 0.9);
            margin-bottom: 1rem;
        }

        .error-content ul {
            list-style: none;
        }

        .error-content li {
            color: rgba(248, 113, 113, 0.9);
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .error-dot {
            width: 0.375rem;
            height: 0.375rem;
            background: rgba(248, 113, 113, 0.8);
            border-radius: 9999px;
            flex-shrink: 0;
        }

        .voting-form {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .position-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            border-radius: 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            border: 2px solid rgba(34, 211, 238, 0.4);
            transition: all 0.3s ease;
        }

        .position-card:hover {
            border-color: rgba(34, 211, 238, 0.8);
            box-shadow: 0 20px 25px -5px rgba(6, 182, 212, 0.3);
        }

        .position-header {
            background: linear-gradient(to right, #06b6d4, #3b82f6, #4f46e5);
            padding: 2rem;
            position: relative;
            overflow: hidden;
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

        .position-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: rgba(34, 211, 238, 0.9);
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .position-description {
            color: #f8fafc;
            font-size: 1rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .candidates-list {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .candidate-option {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            padding: 1.25rem;
            border: 2px solid rgba(34, 211, 238, 0.4);
            border-radius: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .candidate-option:hover {
            border-color: rgba(34, 211, 238, 0.8);
            background: rgba(34, 211, 238, 0.1);
            box-shadow: 0 10px 15px -3px rgba(6, 182, 212, 0.3);
        }

        .candidate-radio {
            width: 1.5rem;
            height: 1.5rem;
            flex-shrink: 0;
            cursor: pointer;
            accent-color: rgba(34, 211, 238, 0.8);
        }

        .candidate-content {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            flex: 1;
        }

        .candidate-photo {
            width: 4rem;
            height: 4rem;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .candidate-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .candidate-photo svg {
            width: 2rem;
            height: 2rem;
            color: #475569;
        }

        .candidate-info h4 {
            font-size: 1.125rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.25rem;
        }

        .candidate-info p {
            font-size: 0.875rem;
            color: #475569;
            margin-top: 0.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .abstain-option {
            border-color: rgba(71, 85, 105, 0.5) !important;
        }

        .abstain-option:hover {
            border-color: rgba(148, 163, 184, 0.8) !important;
            background: rgba(100, 116, 139, 0.5) !important;
        }

        .abstain-text {
            color: rgba(148, 163, 184, 0.9);
            font-weight: 600;
        }

        .no-candidates {
            padding: 2rem;
            text-align: center;
            color: rgba(148, 163, 184, 0.8);
            font-weight: 500;
        }

        .confirmation-section {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            border-radius: 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
            padding: 2rem;
            border: 2px solid rgba(34, 211, 238, 0.4);
        }

        .confirmation-checkbox-label {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            cursor: pointer;
            margin-bottom: 2.5rem;
        }

        .confirmation-checkbox {
            width: 1.5rem;
            height: 1.5rem;
            flex-shrink: 0;
            margin-top: 0.25rem;
            cursor: pointer;
            accent-color: rgba(34, 211, 238, 0.8);
        }

        .confirmation-content h3 {
            font-weight: 700;
            color: rgba(34, 211, 238, 0.9);
            font-size: 1.125rem;
            margin-bottom: 1rem;
        }

        .confirmation-items {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .confirmation-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #e0f2fe;
            font-size: 0.875rem;
        }

        .confirmation-item svg {
            width: 1.25rem;
            height: 1.25rem;
            color: rgba(34, 211, 238, 0.8);
            flex-shrink: 0;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            flex-direction: column;
        }

        @media (min-width: 640px) {
            .action-buttons {
                flex-direction: row;
            }
        }

        .btn {
            flex: 1;
            padding: 1rem 1.5rem;
            border-radius: 1rem;
            font-weight: 700;
            cursor: pointer;
            border: none;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-secondary {
            background-color: rgba(226, 232, 240, 0.8);
            color: #0f172a;
        }

        .btn-secondary:hover {
            background-color: rgba(226, 232, 240, 0.95);
        }

        .btn-primary {
            background: linear-gradient(to right, #10b981, #059669);
            color: #fff;
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.4);
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #059669, #047857);
            box-shadow: 0 20px 25px -5px rgba(16, 185, 129, 0.5);
        }

        .btn-primary:active {
            background: linear-gradient(to right, #047857, #065f46);
        }

        .btn svg {
            width: 1.25rem;
            height: 1.25rem;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.25rem;
            }

            .position-title {
                font-size: 1.5rem;
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
                    <p>Voting in Progress</p>
                </div>
            </div>
            <div class="nav-user">
                <p>{{ session('voter_firstname') }} {{ session('voter_lastname') }}</p>
                <p>Authenticated Voter</p>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="header-icon">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 5l-3 3m0 0l-3-3m3 3v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
            </div>
            <h1 class="page-title">Cast Your Vote</h1>
            <p class="page-subtitle">Select one candidate for each position</p>
        </div>

        <!-- Instructions Card -->
        <div class="instructions-card">
            <svg class="instructions-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
            </svg>
            <div class="instructions-content">
                <h3>Voting Instructions</h3>
                <p>Select one candidate for each position to cast your vote. You may choose to abstain from voting on any position. <strong>Important:</strong> Once you submit your vote, it cannot be changed. Please review your selections carefully before confirming.</p>
            </div>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="error-card">
                <svg class="error-icon" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <div class="error-content">
                    <h3>Please correct the following errors:</h3>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <span class="error-dot"></span>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Voting Form -->
        <form method="POST" action="{{ route('voter.submit-vote') }}" id="votingForm" class="voting-form">
            @csrf

            @foreach($positions as $positionIndex => $position)
                <div class="position-card">
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

                    <!-- Candidates Selection -->
                    @if($position->candidates->count() > 0)
                        <div class="candidates-list">
                            @foreach($position->candidates as $candidate)
                                <label class="candidate-option">
                                    <input 
                                        type="radio" 
                                        name="votes[{{ $position->position_id }}]" 
                                        value="{{ $candidate->candidate_id }}"
                                        class="candidate-radio"
                                    >
                                    <div class="candidate-content">
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
                                            <h4>{{ $candidate->firstname }} {{ $candidate->lastname }}</h4>
                                            @if($candidate->description)
                                                <p>{{ $candidate->description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </label>
                            @endforeach

                            <!-- Abstain Option -->
                            <label class="candidate-option abstain-option">
                                <input 
                                    type="radio" 
                                    name="votes[{{ $position->position_id }}]" 
                                    value=""
                                    class="candidate-radio"
                                >
                                <div class="candidate-content">
                                    <svg class="candidate-photo" fill="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem; border: none; background: none;">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                                    </svg>
                                    <div class="candidate-info">
                                        <h4 class="abstain-text">I choose not to vote for this position</h4>
                                    </div>
                                </div>
                            </label>
                        </div>
                    @else
                        <div class="no-candidates">No candidates available for this position</div>
                    @endif
                </div>
            @endforeach

            <!-- Confirmation Section -->
            <div class="confirmation-section">
                <label class="confirmation-checkbox-label">
                    <input 
                        type="checkbox" 
                        id="confirmVote" 
                        required
                        class="confirmation-checkbox"
                    >
                    <div>
                        <h3>Confirm Your Vote</h3>
                        <div class="confirmation-items">
                            <div class="confirmation-item">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                                <span>I have reviewed my selections carefully</span>
                            </div>
                            <div class="confirmation-item">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                                <span>I understand that my vote cannot be changed after submission</span>
                            </div>
                            <div class="confirmation-item">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                                <span>I am casting this vote of my own free will</span>
                            </div>
                        </div>
                    </div>
                </label>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <a href="{{ route('voter.candidates') }}" class="btn btn-secondary">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Review Candidates
                    </a>
                    <button 
                        type="submit"
                        onclick="return confirm('Are you sure you want to submit your vote?\n\nThis action CANNOT be undone.\n\nPlease confirm that all your selections are correct.');"
                        class="btn btn-primary"
                    >
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        Submit My Vote
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
