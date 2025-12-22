@php
use App\Models\Election;
$election = Election::find(1);
$status = $election ? strtolower($election->status) : 'pending';
// Redirect voters to welcome when election is not open for voting
if (in_array($status, ['pending', 'ended', 'on hold'])) {
    redirect()->route('welcome')->send();
    exit;
}
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Council Election - Voter Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
            position: relative;
            overflow: auto;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.08) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .login-container {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            padding: 3rem 2.5rem;
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .login-logo:hover {
            transform: scale(1.05);
        }

        .login-logo img {
            height: 100px;
            width: auto;
            filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.08));
        }

        .login-title {
            font-size: 2rem;
            color: #0f172a;
            margin-bottom: 0.625rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            letter-spacing: -0.025em;
        }

        .login-subtitle {
            color: #64748b;
            font-size: 1rem;
            font-weight: 500;
        }

        /* Session Status */
        .session-status {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border: 1px solid #86efac;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.75rem;
            display: flex;
            align-items: flex-start;
            gap: 0.875rem;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .session-status-icon {
            flex-shrink: 0;
            color: #16a34a;
            margin-top: 0.125rem;
        }

        .session-status-icon svg {
            width: 20px;
            height: 20px;
        }

        .session-status-text {
            color: #166534;
            font-size: 0.9375rem;
            font-weight: 500;
            line-height: 1.6;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.625rem;
            color: #334155;
            font-size: 0.9375rem;
            font-family: 'Poppins', sans-serif;
        }

        .form-input {
            width: 100%;
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.875rem 1.125rem;
            color: #1e293b;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-1px);
        }

        .form-input:hover:not(:focus) {
            border-color: #cbd5e1;
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        /* Form Errors */
        .form-error {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border: 1px solid #fca5a5;
            border-radius: 10px;
            padding: 0.875rem 1rem;
            margin-top: 0.625rem;
            color: #dc2626;
            font-size: 0.875rem;
            animation: shake 0.4s ease-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .form-error-list {
            list-style: none;
        }

        .form-error-list li {
            margin-bottom: 0.375rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-error-list li:last-child {
            margin-bottom: 0;
        }

        .form-error-list li:before {
            content: '•';
            color: #dc2626;
            font-weight: 700;
            font-size: 1.125rem;
        }

        /* Submit Button */
        .submit-button {
            width: 100%;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
            border: none;
            padding: 1.125rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.0625rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            margin-top: 0.75rem;
            font-family: 'Inter', sans-serif;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
            position: relative;
            overflow: hidden;
        }

        .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .submit-button:hover:not(:disabled)::before {
            left: 100%;
        }

        .submit-button:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.35);
        }

        .submit-button:active:not(:disabled) {
            transform: translateY(0);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .submit-button:disabled {
            background: linear-gradient(135deg, #94a3b8 0%, #cbd5e1 100%);
            cursor: not-allowed;
            box-shadow: none;
        }

        .submit-button svg {
            width: 20px;
            height: 20px;
        }

        /* Help Section */
        .help-section {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.75rem 1.5rem;
            margin-top: 2rem;
        }

        .help-title {
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.875rem;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
        }

        .help-text {
            color: #64748b;
            font-size: 0.9375rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .help-list {
            list-style: none;
        }

        .help-list li {
            color: #475569;
            font-size: 0.875rem;
            margin-bottom: 0.625rem;
            display: flex;
            align-items: flex-start;
            gap: 0.625rem;
            font-weight: 500;
            line-height: 1.5;
        }

        .help-list li:last-child {
            margin-bottom: 0;
        }
        
        .help-list li:before {
            content: '✓';
            color: #3b82f6;
            font-weight: 700;
            font-size: 1rem;
            flex-shrink: 0;
        }

        /* Footer Note */
        .footer-note {
            text-align: center;
            margin-top: 1.75rem;
            color: #94a3b8;
            font-size: 0.875rem;
            line-height: 1.6;
        }

        /* Responsive */
        @media (max-width: 480px) {
            body {
                padding: 1.5rem 1rem;
            }

            .login-card {
                padding: 2.5rem 2rem;
                border-radius: 20px;
            }

            .login-title {
                font-size: 1.75rem;
            }
            
            .login-logo img {
                height: 85px;
            }

            .form-input {
                padding: 0.875rem 1rem;
            }

            .submit-button {
                padding: 1rem 1.5rem;
            }

            .help-section {
                padding: 1.5rem 1.25rem;
            }
        }

        @media (max-width: 360px) {
            .login-card {
                padding: 2rem 1.5rem;
            }

            .login-logo img {
                height: 75px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="login-logo">
                    <img src="{{ asset('Logowithtext.png') }}" alt="CICSelect">
                </div>
                <h1 class="login-title">Voter Login</h1>
                <p class="login-subtitle">CICSelect</p>
            </div>

            <!-- Session Status -->
            @if(session('status'))
                <div class="session-status">
                    <div class="session-status-icon">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                    </div>
                    <p class="session-status-text">{{ session('status') }}</p>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('voter.authenticate') }}">
                @csrf

                <!-- Full Name Field -->
                <div class="form-group">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input 
                        id="fullname" 
                        type="text" 
                        name="fullname" 
                        class="form-input" 
                        value="{{ old('fullname') }}"
                        placeholder="Enter your full name"
                        required 
                        autofocus 
                        autocomplete="name"
                    />
                    @if($errors->has('fullname'))
                        <div class="form-error">
                            <ul class="form-error-list">
                                @foreach($errors->get('fullname') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <!-- Voter Key Field -->
                <div class="form-group">
                    <label for="voter_key" class="form-label">Voter Key</label>
                    <input 
                        id="voter_key" 
                        type="text" 
                        name="voter_key" 
                        class="form-input"
                        placeholder="Enter your voter key"
                        required 
                        autocomplete="off"
                    />
                    @if($errors->has('voter_key'))
                        <div class="form-error">
                            <ul class="form-error-list">
                                @foreach($errors->get('voter_key') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-button">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    Login to Vote
                </button>
            </form>

            <!-- Help Section -->
            <div class="help-section">
                <p class="help-title">Need Help?</p>
                <p class="help-text">If you don't have your voter key or need assistance, please contact the student council election committee.</p>
                <ul class="help-list">
                    <li>Keep your voter key confidential</li>
                    <li>Your vote is completely anonymous</li>
                    <li>Voting is open during election hours only</li>
                </ul>
            </div>

            <!-- Footer Note -->
            <div class="footer-note">
                <p>By logging in, you agree to participate in the student council election process.</p>
            </div>
        </div>
    </div>
</body>
</html>