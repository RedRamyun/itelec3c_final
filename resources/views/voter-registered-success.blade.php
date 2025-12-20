<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f4f8;
            padding: 40px 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif;
        }
        .voter-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-top: 5px solid #1e40af;
            max-width: 500px;
            margin: 0 auto;
        }
        h1 {
            color: #1e40af;
            margin-bottom: 20px;
            font-size: 1.75rem;
        }
        .form-label {
            color: #1e3a8a;
            font-weight: 500;
        }
        .btn-vote {
            background-color: #1e40af;
            color: white;
            padding: 10px 30px;
            border: none;
            margin: 8px;
        }
        .btn-vote:hover {
            background-color: #1e3a8a;
            color: white;
        }
        .success-icon {
            width: 60px;
            height: 60px;
            background-color: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .success-icon svg {
            width: 35px;
            height: 35px;
            stroke: white;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }
        .voter-info {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #e2e8f0;
        }
        .info-label {
            color: #1e3a8a;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        .info-value {
            color: #1e293b;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .voter-key-display {
            background-color: #1e40af;
            color: white;
            padding: 15px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 1px;
            word-break: break-all;
            margin-top: 10px;
        }
        .important-note {
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .important-note strong {
            color: #92400e;
            display: block;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        .important-note p {
            color: #78350f;
            margin: 0;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        .btn-secondary-custom {
            background-color: #f1f5f9;
            border: 2px solid #e2e8f0;
            color: #475569;
            padding: 10px 30px;
            margin: 8px;
        }
        .btn-secondary-custom:hover {
            background-color: #e2e8f0;
            border-color: #cbd5e1;
            color: #475569;
        }
        @media print {
            body {
                background: white;
            }
            .btn-vote, .btn-secondary-custom {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="voter-container">
                    <div class="mb-3">
                        <a href="{{ route('voters.list') }}" class="text-decoration-none">
                            <small>← Back to Voters List</small>
                        </a>
                    </div>
                    
                    <div class="success-icon">
                        <svg viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    
                    <h1 class="text-center">Registration Successful</h1>
                    
                    <p class="text-center text-muted mb-4">Your voter registration has been completed successfully.</p>
                    
                    <div class="voter-info">
                        <div class="info-label">Full Name</div>
                        <div class="info-value">{{ $voter->first_name }} {{ $voter->last_name }}</div>
                        
                        <div class="info-label">Your Voter Key</div>
                        <div class="voter-key-display">
                            {{ $voter->voter_key }}
                        </div>
                    </div>
                    
                    <div class="important-note">
                        <strong>⚠️ Important:</strong>
                        <p>Please save your Voter Key. You will need this key to log in and cast your vote. Keep it secure and do not share it with anyone.</p>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button onclick="window.print()" class="btn btn-secondary-custom">
                            Print This Information
                        </button>
                        <a href="{{ route('register.voter') }}" class="btn btn-vote">
                            Register Another Voter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>