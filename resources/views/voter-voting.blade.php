@extends('layouts.voter')

@section('title', 'Cast Your Vote - Student Election System')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-950 via-slate-900 to-purple-950">
    <!-- Premium Navbar -->
    <nav class="bg-slate-900/80 backdrop-blur-2xl sticky top-0 z-50 shadow-lg border-b border-cyan-500/30">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/50 transform hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-cyan-200" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Election System</h1>
                        <p class="text-xs text-cyan-300/70">Voting in Progress</p>
                    </div>
                </div>
                <div class="hidden sm:block text-right">
                    <p class="text-sm font-semibold text-cyan-200">{{ session('voter_firstname') }} {{ session('voter_lastname') }}</p>
                    <p class="text-xs text-cyan-400/70">Authenticated Voter</p>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <!-- Page Header -->
        <div class="text-center mb-12 sm:mb-16">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl shadow-2xl shadow-cyan-500/50 mb-6 mx-auto transform hover:scale-110 transition-transform duration-300">
                <svg class="w-8 h-8 text-cyan-100" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 5l-3 3m0 0l-3-3m3 3v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
            </div>
            <h1 class="text-5xl sm:text-6xl font-extrabold bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent mb-3 sm:mb-4">Cast Your Vote</h1>
            <p class="text-lg sm:text-xl text-cyan-200/80">Select one candidate for each position</p>
        </div>

        <!-- Instructions Card -->
        <div class="bg-gradient-to-r from-cyan-900/40 to-blue-900/40 border-2 border-cyan-500/60 rounded-3xl p-6 sm:p-8 mb-10 sm:mb-12 backdrop-blur-sm">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0">
                    <svg class="w-7 h-7 text-cyan-400 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-cyan-300 text-lg mb-2">Voting Instructions</h3>
                    <p class="text-cyan-200 text-sm leading-relaxed">Select one candidate for each position to cast your vote. You may choose to abstain from voting on any position. <strong>Important:</strong> Once you submit your vote, it cannot be changed. Please review your selections carefully before confirming.</p>
                </div>
            </div>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-10 sm:mb-12 bg-red-900/40 border-2 border-red-500/60 rounded-3xl p-6 sm:p-8 backdrop-blur-sm">
                <div class="flex items-start gap-4">
                    <svg class="w-6 h-6 text-red-400 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                    <div class="flex-1">
                        <h3 class="font-bold text-red-300 mb-4">Please correct the following errors:</h3>
                        <ul class="space-y-2">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-200 text-sm flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 bg-red-400 rounded-full flex-shrink-0"></span>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Voting Form -->
        <form method="POST" action="{{ route('voter.submit-vote') }}" id="votingForm" class="space-y-8">
            @csrf

            @foreach($positions as $positionIndex => $position)
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl shadow-lg overflow-hidden border-2 border-cyan-400/40 hover:border-cyan-300/80 hover:shadow-xl hover:shadow-cyan-500/30 transition-all duration-300">
                    <!-- Position Header -->
                    <div class="bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-700 px-8 py-8 relative overflow-hidden">
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute inset-0" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
                        </div>
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-3">
                                <span class="inline-flex items-center justify-center w-10 h-10 bg-cyan-400/30 rounded-lg backdrop-blur-sm text-cyan-300 font-bold border border-cyan-300/50">
                                    {{ $positionIndex + 1 }}
                                </span>
                                <span class="inline-block px-3 py-1 bg-cyan-400/20 rounded-full text-cyan-200 text-sm font-semibold border border-cyan-300/40">POSITION</span>
                            </div>
                            <h2 class="text-3xl font-bold text-cyan-300 mb-2 drop-shadow-lg">{{ $position->title }}</h2>
                            @if($position->description)
                                <p class="text-cyan-50 text-base drop-shadow-md">{{ $position->description }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Candidates Selection -->
                    <div class="p-8">
                        @if($position->candidates->count() > 0)
                            <div class="space-y-4">
                                @foreach($position->candidates as $candidate)
                                    <label class="block cursor-pointer group">
                                        <div class="flex items-center gap-5 p-5 border-2 border-cyan-400/40 rounded-2xl hover:border-cyan-300 hover:bg-cyan-500/10 transition-all duration-300 group-hover:shadow-lg group-hover:shadow-cyan-500/30 focus-within:border-cyan-300 focus-within:ring-2 focus-within:ring-cyan-400/20">
                                            <input 
                                                type="radio" 
                                                name="votes[{{ $position->position_id }}]" 
                                                value="{{ $candidate->candidate_id }}"
                                                class="w-6 h-6 text-cyan-400 flex-shrink-0 cursor-pointer"
                                            >
                                            <div class="flex items-center flex-1 gap-5">
                                                <!-- Candidate Photo -->
                                                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-slate-300 to-slate-400 rounded-xl overflow-hidden shadow-md group-hover:scale-110 transition-transform duration-300">
                                                    @if($candidate->imagepath)
                                                        <img src="{{ asset('storage/' . $candidate->imagepath) }}" alt="{{ $candidate->firstname }} {{ $candidate->lastname }}" class="w-full h-full object-cover">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center">
                                                            <svg class="w-8 h-8 text-slate-600" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <span class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors duration-300 block">{{ $candidate->firstname }} {{ $candidate->lastname }}</span>
                                                    @if($candidate->description)
                                                        <p class="text-sm text-slate-600 mt-1 line-clamp-2">{{ $candidate->description }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach

                                <!-- Abstain Option -->
                                <label class="block cursor-pointer group">
                                    <div class="flex items-center gap-5 p-5 border-2 border-slate-600/50 rounded-2xl hover:border-slate-400 hover:bg-slate-700/50 transition-all duration-300 group-hover:shadow-lg focus-within:border-slate-400 focus-within:ring-2 focus-within:ring-slate-400/20">
                                        <input 
                                            type="radio" 
                                            name="votes[{{ $position->position_id }}]" 
                                            value=""
                                            class="w-6 h-6 text-slate-400 flex-shrink-0 cursor-pointer"
                                        >
                                        <div class="flex items-center gap-3 flex-1">
                                            <svg class="w-5 h-5 text-slate-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                                            </svg>
                                            <span class="text-slate-300 font-semibold group-hover:text-slate-100 transition-colors duration-300">I choose not to vote for this position</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @else
                            <p class="text-slate-400 text-center py-8 font-medium">No candidates available for this position</p>
                        @endif
                    </div>
    </div>
    @endforeach

    <!-- Confirmation & Submit Section -->
    <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl shadow-lg p-8 border-2 border-cyan-400/40 hover:border-cyan-300/80 transition-all duration-300">
        <!-- Confirmation Checkbox -->
        <div class="mb-10">
            <label class="flex items-start gap-4 cursor-pointer group">
                <input 
                    type="checkbox" 
                    id="confirmVote" 
                    required
                    class="w-6 h-6 text-emerald-400 flex-shrink-0 mt-1 cursor-pointer rounded transition-all"
                >
                <div class="flex-1">
                    <span class="font-bold text-cyan-300 text-lg block mb-4">Confirm Your Vote</span>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-cyan-200 text-sm">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                            <span>I have reviewed my selections carefully</span>
                        </div>
                        <div class="flex items-center gap-3 text-cyan-200 text-sm">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                            <span>I understand that my vote cannot be changed after submission</span>
                        </div>
                        <div class="flex items-center gap-3 text-cyan-200 text-sm">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                            <span>I am casting this vote of my own free will</span>
                        </div>
                    </div>
                </div>
            </label>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4 flex-col sm:flex-row">
            <a href="{{ route('voter.candidates') }}" class="flex-1 bg-slate-200/80 hover:bg-slate-300/80 text-slate-900 font-bold py-4 px-6 rounded-2xl text-center transition-all duration-300 flex items-center justify-center gap-2 hover:shadow-lg active:scale-95 transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Review Candidates
            </a>
            <button 
                type="submit"
                onclick="return confirm('Are you sure you want to submit your vote?\n\nThis action CANNOT be undone.\n\nPlease confirm that all your selections are correct.');"
                class="flex-1 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 active:from-green-800 active:to-emerald-800 text-white font-bold py-4 px-6 rounded-2xl shadow-lg hover:shadow-2xl transform hover:scale-105 active:scale-95 transition-all duration-300 flex items-center justify-center gap-2"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                </svg>
                Submit My Vote
            </button>
        </div>
    </div>
</form>
</div>
</div>
@endsection
