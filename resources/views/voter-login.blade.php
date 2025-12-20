@extends('layouts.voter')

@section('title', 'Voter Login - Student Election System')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-blue-900 flex items-center justify-center px-4 py-12 sm:py-20 relative overflow-hidden">
    <!-- Animated Decorative background elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-cyan-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-violet-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-pink-400/15 rounded-full blur-3xl animate-pulse" style="animation-delay: 4s;"></div>
    </div>

    <div class="max-w-md w-full relative z-10">
        <!-- Back Button -->
        <a href="{{ route('welcome') }}" class="inline-flex items-center text-cyan-300 hover:text-cyan-100 mb-12 font-medium transition-all hover:gap-3 gap-2 group">
            <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Home
        </a>

        <!-- Login Card -->
        <div class="bg-gradient-to-br from-slate-900 to-slate-800 backdrop-blur-2xl rounded-3xl shadow-2xl overflow-hidden border-2 border-cyan-400/40 hover:border-cyan-300/80 hover:shadow-3xl hover:shadow-cyan-500/30 transition-all duration-500">
            <!-- Header -->
            <div class="bg-gradient-to-br from-cyan-500 via-blue-500 to-indigo-700 px-8 py-14 text-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
                </div>
                <div class="relative">
                    <div class="w-20 h-20 bg-cyan-400/30 backdrop-blur-md rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-2xl transform transition-all duration-300 hover:scale-110 hover:shadow-3xl hover:shadow-cyan-400/50">
                        <svg class="w-10 h-10 text-cyan-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold text-cyan-300 mb-2 drop-shadow-lg">Secure Voter Login</h2>
                    <p class="text-cyan-200 text-base leading-relaxed drop-shadow-md">Enter your credentials to cast your vote securely</p>
                </div>
            </div>

            <div class="px-8 py-12 space-y-7 bg-gradient-to-b from-slate-800 to-slate-900">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-900/60 border-2 border-red-500/70 rounded-2xl p-4 backdrop-blur-sm">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-red-400 mr-1 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <div class="flex-1">
                                <h3 class="font-semibold text-red-300 text-sm mb-2">Invalid Credentials</h3>
                                @foreach ($errors->all() as $error)
                                    <p class="text-sm text-red-200 mb-1">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('voter.authenticate') }}" class="space-y-5">
                    @csrf

                    <!-- Full Name Field -->
                    <div class="space-y-2">
                        <label for="fullname" class="block text-sm font-semibold text-cyan-200">Full Name</label>
                        <input 
                            type="text" 
                            id="fullname" 
                            name="fullname" 
                            value="{{ old('fullname') }}"
                            required 
                            autofocus
                            class="block w-full px-4 py-3 bg-slate-700/80 border-2 border-cyan-400/50 rounded-xl text-black placeholder-slate-300 focus:bg-slate-600 focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-400/40 transition-all duration-200"
                            placeholder="Juan Dela Cruz"
                        >
                    </div>

                    <!-- Voter Key Field -->
                    <div class="space-y-2">
                        <label for="voter_key" class="block text-sm font-semibold text-cyan-200">Voter Key</label>
                        <input 
                            type="text" 
                            id="voter_key" 
                            name="voter_key" 
                            required
                            class="block w-full px-4 py-3 bg-slate-700/80 border-2 border-cyan-400/50 rounded-xl text-black placeholder-slate-300 focus:bg-slate-600 focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-400/40 transition-all duration-200"
                            placeholder="Enter your unique voter key"
                        >
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 active:from-cyan-700 active:to-blue-700 text-black font-bold py-3 px-4 rounded-xl transition-all duration-200 shadow-lg hover:shadow-2xl hover:shadow-cyan-500/50 transform hover:scale-[1.02] active:scale-95 mt-8 flex items-center justify-center gap-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <span class="text-cyan-100">Login to Cast Vote</span>
                    </button>
                </form>

                <!-- Security Message -->
                <div class="mt-8 pt-6 border-t border-cyan-500/30">
                    <div class="bg-emerald-950/60 border-2 border-emerald-500/80 rounded-xl p-4 backdrop-blur-sm hover:bg-emerald-900/70 transition-all shadow-lg">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-sm text-emerald-200 font-medium">Your vote is secure and anonymous. Your credentials will not be shared.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
