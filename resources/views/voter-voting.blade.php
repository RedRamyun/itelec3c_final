<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cast Your Vote - Student Election</title>
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
            max-width: 1000px;
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
            text-align: right;
        }

        .voter-info p:first-child {
            font-weight: 600;
            font-size: 0.9375rem;
        }

        .voter-info p:last-child {
            font-size: 0.8125rem;
            opacity: 0.9;
        }

        /* Main Content */
        .main-container {
            max-width: 1000px;
            margin: 2.5rem auto;
            padding: 0 2rem;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding: 1.5rem 0;
        }

        .page-header h1 {
            font-size: 2.5rem;
            color: #0f172a;
            font-weight: 800;
            margin-bottom: 0.75rem;
            font-family: 'Poppins', sans-serif;
            letter-spacing: -0.03em;
        }

        .page-header p {
            color: #64748b;
            font-size: 1.0625rem;
            line-height: 1.6;
        }

        /* Instructions */
        .instructions-card {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            border: 1px solid #bfdbfe;
            border-radius: 16px;
            padding: 1.75rem 2rem;
            margin-bottom: 2rem;
            display: flex;
            gap: 1.25rem;
            box-shadow: 0 2px 12px rgba(59, 130, 246, 0.1);
        }

        .instructions-icon {
            flex-shrink: 0;
            width: 28px;
            height: 28px;
            color: #2563eb;
        }

        .instructions-content h3 {
            font-weight: 600;
            color: #1e40af;
            font-size: 1.0625rem;
            margin-bottom: 0.625rem;
            font-family: 'Poppins', sans-serif;
        }

        .instructions-content p {
            color: #1e40af;
            font-size: 0.9375rem;
            line-height: 1.65;
        }

        /* Error Messages */
        .error-messages {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border: 1px solid #fca5a5;
            border-radius: 16px;
            padding: 1.75rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 12px rgba(239, 68, 68, 0.1);
        }

        .error-messages h3 {
            color: #dc2626;
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.0625rem;
            font-family: 'Poppins', sans-serif;
        }

        .error-messages ul {
            list-style: none;
        }

        .error-messages li {
            color: #dc2626;
            margin-bottom: 0.625rem;
            display: flex;
            gap: 0.625rem;
            font-size: 0.9375rem;
            font-weight: 500;
        }

        /* Voting Form */
        .voting-form {
            display: flex;
            flex-direction: column;
            gap: 2.5rem;
        }

        /* Position Card */
        .position-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.8);
            transition: all 0.3s ease;
        }

        .position-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .position-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 2rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .position-header-content {
            display: flex;
            align-items: flex-start;
            gap: 1.25rem;
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
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            font-family: 'Poppins', sans-serif;
        }

        .position-title-section {
            flex: 1;
        }

        .position-title {
            font-size: 1.5rem;
            color: #0f172a;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-family: 'Poppins', sans-serif;
            letter-spacing: -0.025em;
        }

        .position-description {
            color: #64748b;
            font-size: 0.9375rem;
            line-height: 1.6;
        }

        /* Candidates List */
        .candidates-list {
            padding: 2rem;
        }

        .candidate-option {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            padding: 1.25rem 1.5rem;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 1rem;
            background: white;
            position: relative;
        }

        .candidate-option:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
            transform: translateX(4px);
        }

        .candidate-option.selected {
            border-color: #3b82f6;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(147, 197, 253, 0.05) 100%);
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.15);
        }

        .candidate-option.selected::after {
            content: '✓';
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
        }

        .candidate-radio {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            cursor: pointer;
            accent-color: #3b82f6;
        }

        .candidate-content {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            flex: 1;
        }

        .candidate-photo {
            width: 64px;
            height: 64px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e2e8f0;
            transition: transform 0.3s ease;
        }

        .candidate-option:hover .candidate-photo {
            transform: scale(1.05);
        }

        .candidate-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .candidate-photo svg {
            width: 32px;
            height: 32px;
            color: #94a3b8;
        }

        .candidate-info h4 {
            font-size: 1.0625rem;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 0.375rem;
            font-family: 'Poppins', sans-serif;
        }

        .candidate-info p {
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
            font-weight: 500;
        }

        /* Abstain Option */
        .abstain-option {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            padding: 1.25rem 1.5rem;
            border: 2px dashed #94a3b8;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8fafc;
            position: relative;
        }

        .abstain-option:hover {
            border-color: #64748b;
            background: #f1f5f9;
            transform: translateX(4px);
        }

        .abstain-option.selected {
            border-color: #8b5cf6;
            border-style: solid;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(196, 181, 253, 0.05) 100%);
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.15);
        }

        .abstain-option.selected::after {
            content: '✓';
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
            box-shadow: 0 2px 8px rgba(124, 58, 237, 0.3);
        }

        .abstain-option svg {
            width: 22px;
            height: 22px;
            color: #7c3aed;
            flex-shrink: 0;
        }

        .abstain-text {
            font-size: 1rem;
            color: #475569;
            flex: 1;
            font-weight: 600;
        }

        /* Confirmation Section */
        .confirmation-section {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border: 1px solid #86efac;
            border-radius: 20px;
            padding: 2rem 2.25rem;
            margin-top: 1.5rem;
            box-shadow: 0 2px 12px rgba(34, 197, 94, 0.1);
        }

        .confirmation-checkbox-label {
            display: flex;
            align-items: flex-start;
            gap: 1.25rem;
            cursor: pointer;
        }

        .confirmation-checkbox {
            width: 22px;
            height: 22px;
            min-width: 22px;
            margin-top: 0.25rem;
            cursor: pointer;
            accent-color: #16a34a;
        }

        .confirmation-content h3 {
            font-weight: 700;
            color: #15803d;
            margin-bottom: 1rem;
            font-size: 1.125rem;
            font-family: 'Poppins', sans-serif;
        }

        .confirmation-items {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .confirmation-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            color: #166534;
            font-size: 0.9375rem;
            font-weight: 500;
        }

        .confirmation-item svg {
            width: 18px;
            height: 18px;
            color: #16a34a;
            flex-shrink: 0;
            margin-top: 0.25rem;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 1.25rem;
            margin-top: 2.5rem;
            padding-top: 2.5rem;
            border-top: 2px solid #e2e8f0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 1.125rem 2rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            flex: 1;
        }

        .btn-secondary {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: #475569;
            border: 2px solid #cbd5e1;
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            border-color: #94a3b8;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
            border: none;
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover:not(:disabled)::before {
            left: 100%;
        }

        .btn-primary:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(37, 99, 235, 0.4);
        }

        .btn-primary:disabled {
            background: linear-gradient(135deg, #94a3b8 0%, #cbd5e1 100%);
            cursor: not-allowed;
            box-shadow: none;
        }

        .btn svg {
            width: 20px;
            height: 20px;
        }

        /* No Positions */
        .no-positions {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
        }

        .no-positions p {
            font-size: 1.0625rem;
            color: #475569;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
        }

        /* Progress Indicator */
        .progress-indicator {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
            padding: 1.25rem 1.5rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
        }

        .progress-number {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
            min-width: 32px;
            height: 32px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
            font-family: 'Poppins', sans-serif;
        }

        .progress-text {
            font-size: 0.9375rem;
            color: #475569;
            font-weight: 500;
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
                text-align: center;
            }

            .main-container {
                padding: 0 1.5rem;
                margin: 2rem auto;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .position-header {
                padding: 1.5rem;
            }

            .candidates-list {
                padding: 1.5rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
            }

            .candidate-content {
                flex-direction: row;
                align-items: center;
                gap: 1rem;
            }

            .candidate-photo {
                width: 56px;
                height: 56px;
            }

            .confirmation-section {
                padding: 1.75rem 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .page-header {
                padding: 1rem 0;
                margin-bottom: 2rem;
            }

            .page-header h1 {
                font-size: 1.75rem;
            }

            .position-header-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .candidates-list {
                padding: 1.25rem;
            }

            .candidate-option {
                padding: 1rem 1.25rem;
            }

            .abstain-option {
                padding: 1rem 1.25rem;
            }

            .main-container {
                margin: 1.5rem auto;
            }

            .instructions-card {
                padding: 1.5rem;
            }

            .voting-form {
                gap: 2rem;
            }
        }

        @media (max-width: 360px) {
            .header-brand img {
                height: 65px;
            }

            .candidate-option {
                padding: 1rem;
            }

            .confirmation-section {
                padding: 1.5rem 1.25rem;
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
                <p>Hello, {{ session('voter_name') }}</p>
                <p>Registered Student Voter</p>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1>Cast Your Vote</h1>
            <p>Select your preferred candidate for each position</p>
        </div>

        <!-- Progress Indicator -->
        <div class="progress-indicator">
            <div class="progress-number">{{ $positions->count() > 0 ? 1 : 0 }}</div>
            <div class="progress-text">Reviewing {{ $positions->count() }} position(s)</div>
        </div>

        <!-- Instructions -->
        <div class="instructions-card">
            <svg class="instructions-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="instructions-content">
                <h3>Voting Instructions</h3>
                <p>Select one candidate per position, or choose to abstain. You may review your selections before submitting. Once submitted, your vote is final and cannot be changed.</p>
            </div>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="error-messages">
                <h3>Please correct the following errors:</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Voting Form -->
        <form method="POST" action="{{ route('voter.submit-vote') }}" class="voting-form" id="votingForm">
            @csrf

            @forelse($positions as $index => $position)
                <div class="position-card">
                    <div class="position-header">
                        <div class="position-header-content">
                            <div class="position-number">{{ $index + 1 }}</div>
                            <div class="position-title-section">
                                <h2 class="position-title">{{ $position->position_name }}</h2>
                                @if($position->description)
                                    <p class="position-description">{{ $position->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="candidates-list">
                        @if($position->candidates->count() > 0)
                            @foreach($position->candidates as $candidate)
                                <label class="candidate-option" data-position="{{ $position->position_id }}">
                                    <input 
                                        type="radio" 
                                        name="votes[{{ $position->position_id }}]" 
                                        value="{{ $candidate->candidate_id }}"
                                        {{ old('votes.' . $position->position_id) == $candidate->candidate_id ? 'checked' : '' }}
                                        class="candidate-radio"
                                        data-position-id="{{ $position->position_id }}"
                                        data-candidate-id="{{ $candidate->candidate_id }}"
                                    />
                                    <div class="candidate-content">
                                        <div class="candidate-photo">
                                            @if($candidate->imagepath)
                                                <img src="{{ asset('storage/' . $candidate->imagepath) }}" alt="{{ $candidate->candidate_name }}">
                                            @else
                                                <svg fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="candidate-info">
                                            <h4>{{ $candidate->candidate_name }}</h4>
                                            <p>{{ $position->position_name }}</p>
                                            @if($candidate->party_affiliation)
                                                <p>{{ $candidate->party_affiliation }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        @endif

                        <!-- Abstain Option -->
                        <label class="abstain-option" data-position="{{ $position->position_id }}">
                            <input 
                                type="radio" 
                                name="votes[{{ $position->position_id }}]" 
                                value="abstain"
                                {{ old('votes.' . $position->position_id) == 'abstain' ? 'checked' : '' }}
                                class="candidate-radio"
                                data-position-id="{{ $position->position_id }}"
                                data-candidate-id="abstain"
                            />
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <span class="abstain-text">Abstain from this position</span>
                        </label>
                    </div>
                </div>
            @empty
                <div class="no-positions">
                    <p>No positions available for voting at this time.</p>
                </div>
            @endforelse

            <!-- Confirmation Section -->
            @if($positions->count() > 0)
                <div class="confirmation-section">
                    <label class="confirmation-checkbox-label">
                        <input type="checkbox" name="confirmation" id="confirmation" class="confirmation-checkbox" required />
                        <div class="confirmation-content">
                            <h3>Confirm Your Vote</h3>
                            <div class="confirmation-items">
                                <div class="confirmation-item">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                    </svg>
                                    <span>I have reviewed all my selections</span>
                                </div>
                                <div class="confirmation-item">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                    </svg>
                                    <span>I understand my vote is final</span>
                                </div>
                                <div class="confirmation-item">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                    </svg>
                                    <span>I am voting voluntarily</span>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <a href="{{ route('voter.candidates') }}" class="btn btn-secondary">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Review Candidates
                    </a>
                    <button 
                        type="button"
                        class="btn btn-primary"
                        id="submitBtn"
                    >
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        Submit Vote
                    </button>
                </div>
            @endif
        </form>
    </div>

    <script>
        // Highlight selected options
        document.addEventListener('DOMContentLoaded', function() {
            // Update visual state when radio buttons change
            document.querySelectorAll('input[type="radio"][name^="votes"]').forEach(radio => {
                // Set initial state
                updateOptionState(radio);
                
                // Update on change
                radio.addEventListener('change', function() {
                    updateOptionState(this);
                });
            });
            
            function updateOptionState(radio) {
                const label = radio.closest('label');
                const positionId = radio.getAttribute('data-position-id');
                
                // Remove selected class from all options in this position
                document.querySelectorAll(`label[data-position="${positionId}"]`).forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // Add selected class to this option if checked
                if (radio.checked) {
                    label.classList.add('selected');
                }
            }
            
            // Enable/disable submit button based on confirmation checkbox
            const confirmationCheckbox = document.getElementById('confirmation');
            const submitBtn = document.getElementById('submitBtn');
            
            if (confirmationCheckbox && submitBtn) {
                confirmationCheckbox.addEventListener('change', function() {
                    submitBtn.disabled = !this.checked;
                });
                
                // Initial state
                submitBtn.disabled = !confirmationCheckbox.checked;
                
                // Handle submit button click
                submitBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    confirmSubmission();
                });
            }
        });
        
        function confirmSubmission() {
            // Check if confirmation is checked
            const confirmationCheckbox = document.getElementById('confirmation');
            if (!confirmationCheckbox || !confirmationCheckbox.checked) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Confirmation Required',
                    text: 'Please confirm your vote by checking the confirmation box.',
                    background: '#ffffff',
                    color: '#1e293b',
                    iconColor: '#f59e0b',
                    confirmButtonColor: '#2563eb',
                    confirmButtonText: 'Got it',
                    didOpen: (modal) => {
                        modal.style.borderRadius = '16px';
                        modal.style.boxShadow = '0 20px 60px rgba(0, 0, 0, 0.2)';
                        modal.style.border = '2px solid #e2e8f0';
                        
                        const title = modal.querySelector('.swal2-title');
                        title.style.fontFamily = "'Poppins', sans-serif";
                        title.style.fontWeight = '800';
                        title.style.background = 'linear-gradient(135deg, #1e40af 0%, #3b82f6 100%)';
                        title.style.webkitBackgroundClip = 'text';
                        title.style.webkitTextFillColor = 'transparent';
                        title.style.backgroundClip = 'text';
                        
                        const confirmBtn = modal.querySelector('.swal2-confirm');
                        confirmBtn.style.background = 'linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%)';
                        confirmBtn.style.border = 'none';
                        confirmBtn.style.borderRadius = '10px';
                        confirmBtn.style.padding = '0.875rem 2rem';
                        confirmBtn.style.fontWeight = '700';
                        confirmBtn.style.fontFamily = "'Poppins', sans-serif";
                        confirmBtn.style.boxShadow = '0 4px 16px rgba(37, 99, 235, 0.25)';
                    }
                });
                return;
            }
            
            // Count selected votes
            const selectedVotes = document.querySelectorAll('input[type="radio"][name^="votes"]:checked').length;
            const totalPositions = {{ $positions->count() }};
            
            if (selectedVotes !== totalPositions) {
                Swal.fire({
                    icon: 'question',
                    title: 'Incomplete Voting',
                    html: 'You have not voted for all positions.<br><br>You can choose to <strong>abstain</strong> for specific positions.<br><br>Are you sure you want to submit?',
                    background: '#ffffff',
                    color: '#1e293b',
                    iconColor: '#3b82f6',
                    confirmButtonColor: '#2563eb',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, Submit',
                    cancelButtonText: 'Go Back',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    didOpen: (modal) => {
                        modal.style.borderRadius = '16px';
                        modal.style.boxShadow = '0 20px 60px rgba(0, 0, 0, 0.2)';
                        modal.style.border = '2px solid #e2e8f0';
                        
                        const title = modal.querySelector('.swal2-title');
                        title.style.fontFamily = "'Poppins', sans-serif";
                        title.style.fontWeight = '800';
                        title.style.background = 'linear-gradient(135deg, #1e40af 0%, #3b82f6 100%)';
                        title.style.webkitBackgroundClip = 'text';
                        title.style.webkitTextFillColor = 'transparent';
                        title.style.backgroundClip = 'text';
                        
                        const content = modal.querySelector('.swal2-html-container');
                        content.style.fontSize = '1rem';
                        content.style.lineHeight = '1.6';
                        
                        const confirmBtn = modal.querySelector('.swal2-confirm');
                        confirmBtn.style.background = 'linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%)';
                        confirmBtn.style.border = 'none';
                        confirmBtn.style.borderRadius = '10px';
                        confirmBtn.style.padding = '0.875rem 2rem';
                        confirmBtn.style.fontWeight = '700';
                        confirmBtn.style.fontFamily = "'Poppins', sans-serif";
                        confirmBtn.style.boxShadow = '0 4px 16px rgba(37, 99, 235, 0.25)';
                        
                        const cancelBtn = modal.querySelector('.swal2-cancel');
                        cancelBtn.style.background = 'white';
                        cancelBtn.style.color = '#475569';
                        cancelBtn.style.border = '2px solid #cbd5e1';
                        cancelBtn.style.borderRadius = '10px';
                        cancelBtn.style.padding = '0.875rem 2rem';
                        cancelBtn.style.fontWeight = '700';
                        cancelBtn.style.fontFamily = "'Poppins', sans-serif";
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('votingForm').submit();
                    }
                });
                return;
            }
            
            Swal.fire({
                icon: 'warning',
                title: 'Confirm Your Vote',
                html: '<strong>Are you sure you want to submit your vote?</strong><br><br><span style="color: #dc2626; font-weight: 600;">⚠ This action cannot be undone.</span>',
                background: '#ffffff',
                color: '#1e293b',
                iconColor: '#f59e0b',
                confirmButtonColor: '#2563eb',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, Submit Vote',
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
                    document.getElementById('votingForm').submit();
                }
            });
        }
        
        // Save progress in localStorage
        document.addEventListener('DOMContentLoaded', function() {
            // Restore saved selections
            document.querySelectorAll('input[type="radio"][name^="votes"]').forEach(radio => {
                const positionId = radio.getAttribute('data-position-id');
                const saved = localStorage.getItem(`vote_${positionId}`);
                
                if (saved && radio.value === saved) {
                    radio.checked = true;
                    updateOptionState(radio);
                }
            });
            
            // Save on change
            document.querySelectorAll('input[type="radio"][name^="votes"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    const positionId = this.getAttribute('data-position-id');
                    if (this.checked) {
                        localStorage.setItem(`vote_${positionId}`, this.value);
                    }
                });
            });
            
            // Clear on form submit
            document.getElementById('votingForm').addEventListener('submit', function() {
                document.querySelectorAll('input[type="radio"][name^="votes"]').forEach(radio => {
                    const positionId = radio.getAttribute('data-position-id');
                    localStorage.removeItem(`vote_${positionId}`);
                });
            });
        });
        
        function updateOptionState(radio) {
            const label = radio.closest('label');
            const positionId = radio.getAttribute('data-position-id');
            
            // Remove selected class from all options in this position
            document.querySelectorAll(`label[data-position="${positionId}"]`).forEach(opt => {
                opt.classList.remove('selected');
            });
            
            // Add selected class to this option if checked
            if (radio.checked) {
                label.classList.add('selected');
            }
        }
    </script>
</body>
</html>