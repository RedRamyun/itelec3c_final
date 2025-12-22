<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet the Candidates</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            color: #1e293b;
            line-height: 1.7;
        }

        /* Header */
        .election-header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(30, 64, 175, 0.15);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
        }

        .header-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .header-brand img {
            height: 90px;
            width: auto;
            filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }

        .header-brand img:hover {
            transform: scale(1.05);
        }

        .header-icon {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-icon svg {
            width: 20px;
            height: 20px;
            color: #1e40af;
        }

        .header-title h1 {
            font-size: 1.25rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            letter-spacing: -0.025em;
        }

        .header-title p {
            font-size: 0.75rem;
            opacity: 0.95;
        }

        .voter-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .voter-details {
            text-align: right;
        }

        .voter-details p:first-child {
            font-weight: 600;
            font-size: 0.9375rem;
        }

        .voter-details p:last-child {
            font-size: 0.8125rem;
            opacity: 0.9;
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 0.625rem 1.25rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.625rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-1px);
        }

        .logout-btn svg {
            width: 16px;
            height: 16px;
        }

        /* Main Content */
        .main-container {
            max-width: 1280px;
            margin: 2.5rem auto;
            padding: 0 2rem;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 2rem 0;
            position: relative;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.05) 0%, transparent 70%);
            pointer-events: none;
            z-index: -1;
        }

        .page-header h1 {
            font-size: 2.5rem;
            color: #0f172a;
            font-weight: 800;
            margin-bottom: 1rem;
            font-family: 'Poppins', sans-serif;
            letter-spacing: -0.03em;
        }

        .page-header p {
            color: #64748b;
            font-size: 1.0625rem;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* Position Cards */
        .position-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            margin-bottom: 2.5rem;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.8);
            transition: all 0.3s ease;
        }

        .position-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .position-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 2rem 2rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .position-title-container {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
        }

        .position-number {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
            min-width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            font-family: 'Poppins', sans-serif;
        }

        .position-title {
            font-size: 1.5rem;
            color: #0f172a;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            letter-spacing: -0.025em;
        }

        .position-description {
            color: #64748b;
            font-size: 0.9375rem;
            margin-left: 3.5rem;
            line-height: 1.65;
        }

        /* Candidates Grid */
        .candidates-container {
            padding: 2rem;
        }

        .candidates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 200px));
            gap: 2rem;
            justify-content: center;
        }

        .candidate-card {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .candidate-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 16px;
            padding: 2px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .candidate-card:hover::before {
            opacity: 1;
        }

        .candidate-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12);
            border-color: transparent;
        }

        .candidate-photo-wrapper {
            height: 180px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 2px solid #e2e8f0;
            position: relative;
        }

        .candidate-photo {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid white;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            background: #e2e8f0;
            transition: transform 0.3s ease;
        }

        .candidate-card:hover .candidate-photo {
            transform: scale(1.05);
        }

        .candidate-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .candidate-photo svg {
            width: 52px;
            height: 52px;
            color: #94a3b8;
        }

        .candidate-info {
            padding: 1.5rem 1.25rem;
            text-align: center;
        }

        .candidate-name {
            font-size: 1.0625rem;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 0.375rem;
            font-family: 'Poppins', sans-serif;
            letter-spacing: -0.0125em;
        }

        .candidate-position {
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 0.625rem;
            font-weight: 500;
        }

        .candidate-party {
            font-size: 0.8125rem;
            color: #475569;
            font-style: italic;
            padding-top: 0.75rem;
            border-top: 1px solid #f1f5f9;
            font-weight: 500;
        }

        /* Empty States */
        .empty-candidates {
            text-align: center;
            padding: 3.5rem 1.5rem;
            color: #64748b;
        }

        .empty-candidates svg {
            width: 56px;
            height: 56px;
            color: #cbd5e1;
            margin-bottom: 1.25rem;
        }

        .empty-candidates p {
            font-size: 1rem;
            line-height: 1.6;
        }

        .no-positions {
            text-align: center;
            padding: 5rem 2rem;
            background: white;
            border-radius: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
        }

        .no-positions svg {
            width: 72px;
            height: 72px;
            color: #cbd5e1;
            margin-bottom: 2rem;
        }

        .no-positions h3 {
            font-size: 1.5rem;
            color: #334155;
            margin-bottom: 0.75rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        .no-positions p {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.7;
        }

        /* Voting Button */
        .voting-section {
            text-align: center;
            margin-top: 4rem;
            padding: 3rem 2rem;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .voting-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
            text-decoration: none;
            padding: 1.125rem 2.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.0625rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.3);
            position: relative;
            overflow: hidden;
        }

        .voting-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .voting-btn:hover::before {
            left: 100%;
        }

        .voting-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(37, 99, 235, 0.4);
        }

        .voting-btn:active {
            transform: translateY(-1px);
        }

        .voting-btn svg {
            width: 20px;
            height: 20px;
        }

        .voting-section p {
            margin-top: 1.25rem;
            color: #64748b;
            font-size: 0.9375rem;
            line-height: 1.6;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .header-brand img {
                height: 75px;
            }

            .voter-info {
                width: 100%;
                justify-content: center;
            }

            .main-container {
                padding: 0 1.5rem;
                margin: 2rem auto;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .candidates-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                gap: 1.5rem;
            }

            .position-header {
                padding: 1.5rem 1.5rem;
            }

            .position-title-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .position-title {
                font-size: 1.25rem;
            }

            .position-description {
                margin-left: 0;
            }

            .candidates-container {
                padding: 1.5rem;
            }

            .voting-section {
                padding: 2.5rem 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .candidates-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.25rem;
            }

            .voter-info {
                flex-direction: column;
                gap: 1rem;
            }

            .voter-details {
                text-align: center;
            }

            .page-header h1 {
                font-size: 1.75rem;
            }

            .page-header {
                padding: 1.5rem 0;
                margin-bottom: 2rem;
            }

            .position-card {
                margin-bottom: 2rem;
            }

            .candidate-photo-wrapper {
                height: 160px;
            }

            .candidate-photo {
                width: 95px;
                height: 95px;
            }

            .voting-btn {
                width: 100%;
                justify-content: center;
                padding: 1rem 2rem;
            }

            .main-container {
                margin: 1.5rem auto;
            }
        }

        @media (max-width: 360px) {
            .header-brand img {
                height: 65px;
            }

            .candidates-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="election-header">
        <div class="header-container">
            <div class="header-brand">
                <img src="{{ asset('Logowithtext.png') }}" alt="CICSelect" style="height: 100px; width: auto;">
            </div>
            
            <div class="voter-info">
                <div class="voter-details">
                    <p>Hello, {{ session('voter_name') }}</p>
                    <p>Registered Student Voter</p>
                </div>
                <form method="POST" action="{{ route('voter.logout') }}" id="logoutForm">
                    @csrf
                    <button type="button" class="logout-btn" onclick="confirmLogout()">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1>Meet the Candidates</h1>
            <p>Review all candidates running for student council positions. Learn about each candidate before casting your vote.</p>
        </div>

        <!-- Positions and Candidates -->
        @forelse($positions as $index => $position)
            <div class="position-card">
                <!-- Position Header -->
                <div class="position-header">
                    <div class="position-title-container">
                        <div class="position-number">{{ $index + 1 }}</div>
                        <h2 class="position-title">{{ $position->position_name }}</h2>
                    </div>
                    @if($position->description)
                        <p class="position-description">{{ $position->description }}</p>
                    @endif
                </div>

                <!-- Candidates -->
                <div class="candidates-container">
                    @if($position->candidates->count() > 0)
                        <div class="candidates-grid">
                            @foreach($position->candidates as $candidate)
                                <div class="candidate-card">
                                    <div class="candidate-photo-wrapper">
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
                    @else
                        <div class="empty-candidates">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p>No candidates have registered for this position yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="no-positions">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3>No Positions Available</h3>
                <p>Election positions will be announced soon. Please check back later.</p>
            </div>
        @endforelse

        <!-- Proceed to Voting -->
        @if($positions->count() > 0)
            <div class="voting-section">
                <a href="{{ route('voter.voting') }}" class="voting-btn">
                    <span>Proceed to Voting</span>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <p style="margin-top: 1rem; color: #64748b; font-size: 0.9rem;">
                    Review all candidates before proceeding to the voting ballot.
                </p>
            </div>
        @endif
    </div>

    <script>
        function confirmLogout() {
            Swal.fire({
                icon: 'warning',
                title: 'Sign Out',
                html: '<strong>Are you sure you want to sign out?</strong><br><br><span style="color: #dc2626; font-weight: 600;">You will need to log back in to vote.</span>',
                background: '#ffffff',
                color: '#1e293b',
                iconColor: '#f59e0b',
                confirmButtonColor: '#2563eb',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, Sign Out',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
                allowOutsideClick: false,
                didOpen: (modal) => {
                    modal.style.borderRadius = '16px';
                    modal.style.boxShadow = '0 20px 60px rgba(0, 0, 0, 0.2)';
                    modal.style.border = '2px solid #e2e8f0';
                    
                    const title = modal.querySelector('.swal2-title');
                    title.style.fontSize = '1.75rem';
                    title.style.fontWeight = '800';
                    title.style.fontFamily = "'Poppins', sans-serif";
                    title.style.background = 'linear-gradient(135deg, #1e40af 0%, #3b82f6 100%)';
                    title.style.webkitBackgroundClip = 'text';
                    title.style.webkitTextFillColor = 'transparent';
                    title.style.backgroundClip = 'text';
                    title.style.marginBottom = '1.5rem';
                    
                    const content = modal.querySelector('.swal2-html-container');
                    content.style.fontSize = '1rem';
                    content.style.lineHeight = '1.6';
                    content.style.marginBottom = '2rem';
                    
                    const confirmBtn = modal.querySelector('.swal2-confirm');
                    confirmBtn.style.background = 'linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%)';
                    confirmBtn.style.border = 'none';
                    confirmBtn.style.borderRadius = '10px';
                    confirmBtn.style.padding = '0.875rem 2rem';
                    confirmBtn.style.fontWeight = '700';
                    confirmBtn.style.fontSize = '0.95rem';
                    confirmBtn.style.fontFamily = "'Poppins', sans-serif";
                    confirmBtn.style.boxShadow = '0 4px 16px rgba(37, 99, 235, 0.25)';
                    confirmBtn.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    
                    const cancelBtn = modal.querySelector('.swal2-cancel');
                    cancelBtn.style.background = 'white';
                    cancelBtn.style.color = '#475569';
                    cancelBtn.style.border = '2px solid #cbd5e1';
                    cancelBtn.style.borderRadius = '10px';
                    cancelBtn.style.padding = '0.875rem 2rem';
                    cancelBtn.style.fontWeight = '700';
                    cancelBtn.style.fontSize = '0.95rem';
                    cancelBtn.style.fontFamily = "'Poppins', sans-serif";
                    cancelBtn.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    
                    confirmBtn.addEventListener('mouseenter', () => {
                        confirmBtn.style.transform = 'translateY(-2px)';
                        confirmBtn.style.boxShadow = '0 6px 24px rgba(37, 99, 235, 0.35)';
                    });
                    
                    confirmBtn.addEventListener('mouseleave', () => {
                        confirmBtn.style.transform = 'translateY(0)';
                        confirmBtn.style.boxShadow = '0 4px 16px rgba(37, 99, 235, 0.25)';
                    });
                    
                    cancelBtn.addEventListener('mouseenter', () => {
                        cancelBtn.style.background = '#f8fafc';
                        cancelBtn.style.borderColor = '#94a3b8';
                        cancelBtn.style.transform = 'translateY(-2px)';
                    });
                    
                    cancelBtn.addEventListener('mouseleave', () => {
                        cancelBtn.style.background = 'white';
                        cancelBtn.style.borderColor = '#cbd5e1';
                        cancelBtn.style.transform = 'translateY(0)';
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            });
        }
    </script>
</body>
</html>