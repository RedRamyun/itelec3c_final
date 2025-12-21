<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Login - Student Election System</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            padding: 1rem;
        }

        .login-wrapper {
            width: 100%;
            max-width: 28rem;
        }

        .login-card {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(30, 58, 138, 0.95) 100%);
            border: 2px solid rgba(34, 211, 238, 0.3);
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            padding: 3rem 2rem;
            backdrop-filter: blur(32px);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .logo-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 4rem;
            height: 4rem;
            background: linear-gradient(135deg, #06b6d4 0%, #2563eb 100%);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(6, 182, 212, 0.5);
            margin-bottom: 1.5rem;
        }

        .logo-circle svg {
            width: 2rem;
            height: 2rem;
            color: #e0f2fe;
        }

        .login-title {
            font-size: 2rem;
            font-weight: 900;
            background: linear-gradient(to right, #cffafe, #93c5fd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: rgba(34, 211, 238, 0.8);
            font-size: 0.875rem;
        }

        /* Session Status */
        .session-status {
            background: linear-gradient(to right, rgba(5, 150, 105, 0.4), rgba(5, 150, 105, 0.5));
            border: 2px solid rgba(16, 185, 129, 0.6);
            border-radius: 1rem;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .session-status-icon {
            flex-shrink: 0;
            color: rgba(16, 185, 129, 0.8);
            margin-top: 0.125rem;
        }

        .session-status-icon svg {
            width: 1.25rem;
            height: 1.25rem;
        }

        .session-status-text {
            color: #a7f3d0;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: rgba(34, 211, 238, 0.9);
            font-size: 0.875rem;
        }

        .form-input {
            width: 100%;
            background: rgba(15, 23, 42, 0.8);
            border: 2px solid rgba(34, 211, 238, 0.3);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            color: #e0f2fe;
            font-size: 1rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .form-input:focus {
            outline: none;
            border-color: rgba(34, 211, 238, 0.8);
            background: rgba(15, 23, 42, 0.95);
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.1);
        }

        .form-input::placeholder {
            color: rgba(148, 163, 184, 0.6);
        }

        /* Form Errors */
        .form-error {
            background: rgba(220, 38, 38, 0.3);
            border: 1px solid rgba(220, 38, 38, 0.5);
            border-radius: 0.5rem;
            padding: 0.75rem;
            margin-top: 0.5rem;
            color: #fca5a5;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .form-error-list {
            list-style: none;
        }

        .form-error-list li {
            margin-bottom: 0.25rem;
        }

        .form-error-list li:before {
            content: '• ';
            margin-right: 0.5rem;
        }

        /* Submit Button */
        .submit-button {
            width: 100%;
            background: linear-gradient(to right, #06b6d4, #2563eb);
            color: #e0f2fe;
            border: none;
            padding: 0.875rem;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(6, 182, 212, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .submit-button:hover:not(:disabled) {
            background: linear-gradient(to right, #06a6d4, #1d4ed8);
            box-shadow: 0 20px 25px -5px rgba(6, 182, 212, 0.4);
            transform: translateY(-2px);
        }

        .submit-button:active:not(:disabled) {
            transform: translateY(0);
        }

        .submit-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .submit-button svg {
            width: 1.25rem;
            height: 1.25rem;
        }

        /* Info Box */
        .info-box {
            background: rgba(34, 211, 238, 0.1);
            border-left: 4px solid rgba(34, 211, 238, 0.8);
            border-radius: 0.75rem;
            padding: 1rem;
            margin-top: 2rem;
        }

        .info-box-title {
            font-weight: 700;
            color: rgba(34, 211, 238, 0.9);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .info-box-text {
            color: rgba(34, 211, 238, 0.7);
            font-size: 0.75rem;
            line-height: 1.5;
        }

        .info-box-list {
            margin-top: 0.5rem;
            padding-left: 1rem;
        }

        .info-box-list li {
            color: rgba(34, 211, 238, 0.6);
            font-size: 0.75rem;
            margin-bottom: 0.25rem;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .login-card {
                padding: 2rem 1.5rem;
            }

            .login-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="logo-circle">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                    </svg>
                </div>
                <h1 class="login-title">Cast Your Vote</h1>
                <p class="login-subtitle">Secure voter authentication</p>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Login to Vote
                </button>
            </form>

            <!-- Info Box -->
            <div class="info-box">
                <p class="info-box-title">Need Help?</p>
                <p class="info-box-text">If you don't have your voter key or need assistance, please contact the election administrator.</p>
                <ul class="info-box-list">
                    <li>✓ Keep your voter key confidential</li>
                    <li>✓ Your vote is completely anonymous</li>
                    <li>✓ All data is securely encrypted</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
