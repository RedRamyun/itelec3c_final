<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Election System')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/voting-system.css') }}">
    <meta name="description" content="Secure, Modern, and Professional Student Election Voting System">
    <meta name="theme-color" content="#2563eb">
    <style>
        * {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            min-height: 100vh;
        }
        
        /* Premium gradient background pattern */
        .bg-pattern {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            background-attachment: fixed;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Selection color */
        ::selection {
            background-color: rgba(37, 99, 235, 0.2);
            color: #1f2937;
        }
        
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        /* Loading animation */
        .loader {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top-color: #2563eb;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Fade in animation for page load */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        body {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Smooth transitions */
        * {
            transition-property: background-color, border-color, color, fill, stroke;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
        }
        
        button, a[role="button"], input[type="button"], input[type="submit"] {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-pattern min-h-screen">
    @yield('content')
    @stack('scripts')
    
    <!-- Global Scripts -->
    <script>
        // Smooth transitions on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.animation = 'fadeInUp 0.6s ease-out';
        });
        
        // Add active state to current links
        document.querySelectorAll('a').forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>
