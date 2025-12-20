@extends('layouts.voter')

@section('title', 'Election Results - Student Election System')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-950 via-slate-900 to-purple-950">
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
                        <h1 class="text-lg font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Election System</h1>
                        <p class="text-xs text-cyan-300/70">Live Results</p>
                    </div>
                </div>
                @if(session('voter_firstname'))
                    <div class="flex items-center space-x-6">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-semibold text-cyan-200">{{ session('voter_firstname') }} {{ session('voter_lastname') }}</p>
                            <p class="text-xs text-cyan-400/70">Your vote has been counted</p>
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
                @endif
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-8 sm:mb-12 bg-gradient-to-r from-emerald-900/40 to-emerald-900/50 border-2 border-emerald-500/60 rounded-3xl p-6 sm:p-8 shadow-md hover:shadow-lg transition-all duration-300 animate-in">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-10 h-10 text-emerald-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-emerald-300 mb-1">Vote Submitted Successfully!</h3>
                        <p class="text-emerald-200">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Page Header -->
        <div class="text-center mb-16 sm:mb-20">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl shadow-2xl shadow-cyan-500/50 mb-6 mx-auto transform hover:scale-110 transition-transform duration-300">
                <svg class="w-8 h-8 text-cyan-100" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <h1 class="text-5xl sm:text-6xl font-extrabold bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent mb-3 sm:mb-4">Election Results</h1>
            <p class="text-lg sm:text-xl text-cyan-200/80 max-w-2xl mx-auto leading-relaxed">Live results from the ongoing election. Results are updated in real-time.</p>
        </div>

        <!-- Statistics Summary -->
        <div class="grid md:grid-cols-3 gap-6 sm:gap-8 mb-16 sm:mb-20">
            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl shadow-lg p-8 border-2 border-cyan-400/40 hover:border-cyan-300/80 hover:shadow-xl hover:shadow-cyan-500/30 transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-cyan-300 uppercase tracking-widest">Total Voters</p>
                        <p class="text-5xl sm:text-6xl font-extrabold text-cyan-200 mt-3">{{ $totalVoters }}</p>
                        <p class="text-sm text-cyan-400/70 mt-2">Registered voters</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500/30 to-cyan-600/20 rounded-2xl flex items-center justify-center shadow-md border border-cyan-400/50">
                        <svg class="w-9 h-9 text-cyan-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl shadow-lg p-8 border-2 border-emerald-400/40 hover:border-emerald-300/80 hover:shadow-xl hover:shadow-emerald-500/30 transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-emerald-300 uppercase tracking-widest">Votes Cast</p>
                        <p class="text-5xl sm:text-6xl font-extrabold text-emerald-400 mt-3">{{ $votedCount }}</p>
                        <p class="text-sm text-emerald-400/70 mt-2">Votes submitted</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500/30 to-emerald-600/20 rounded-2xl flex items-center justify-center shadow-md border border-emerald-400/50">
                        <svg class="w-9 h-9 text-emerald-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl shadow-lg p-8 border-2 border-indigo-400/40 hover:border-indigo-300/80 hover:shadow-xl hover:shadow-indigo-500/30 transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-indigo-300 uppercase tracking-widest">Turnout</p>
                        <p class="text-5xl sm:text-6xl font-extrabold text-indigo-400 mt-3">{{ $turnoutPercentage }}%</p>
                        <p class="text-sm text-indigo-400/70 mt-2">Voter participation</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500/30 to-indigo-600/20 rounded-2xl flex items-center justify-center shadow-md border border-indigo-400/50">
                        <svg class="w-9 h-9 text-indigo-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results by Position -->
        @forelse($positions as $positionIndex => $position)
            <div class="mb-16 sm:mb-20">
                <!-- Position Header -->
                <div class="bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-700 rounded-3xl shadow-2xl shadow-cyan-500/40 px-8 py-12 mb-10 relative overflow-hidden group hover:shadow-3xl hover:shadow-cyan-500/60 transition-all duration-300">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
                    </div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-4">
                            <span class="inline-flex items-center justify-center w-12 h-12 bg-cyan-400/30 rounded-lg backdrop-blur-sm border border-cyan-300/50 text-cyan-300 font-bold text-lg">
                                {{ $positionIndex + 1 }}
                            </span>
                            <span class="inline-block px-4 py-2 bg-cyan-400/20 rounded-full text-cyan-200 text-sm font-semibold backdrop-blur-sm border border-cyan-300/40">POSITION</span>
                        </div>
                        <h2 class="text-4xl font-bold text-cyan-300 mb-2 drop-shadow-lg">{{ $position->title }}</h2>
                        @if($position->description)
                            <p class="text-cyan-50 text-lg leading-relaxed drop-shadow-md">{{ $position->description }}</p>
                        @endif
                    </div>
                </div>

                @php
                    $candidates = $position->candidates;
                    $voteCounts = $position->voteCounts;
                    $totalVotesForPosition = $voteCounts->sum('vote_count');
                @endphp

                <!-- Results Cards -->
                @if($candidates->count() > 0)
                    <div class="space-y-6">
                        @foreach($candidates->sortByDesc(function($candidate) use ($voteCounts) {
                            return $voteCounts->where('candidate_id', $candidate->candidate_id)->first()?->vote_count ?? 0;
                        }) as $rank => $candidate)
                            @php
                                $voteCount = $voteCounts->where('candidate_id', $candidate->candidate_id)->first();
                                $votes = $voteCount ? $voteCount->vote_count : 0;
                                $percentage = $totalVotesForPosition > 0 ? round(($votes / $totalVotesForPosition) * 100, 1) : 0;
                                $isLeading = $rank === 0 && $votes > 0;
                            @endphp

                            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl shadow-lg overflow-hidden border-2 {{ $isLeading ? 'border-yellow-400/80 shadow-xl shadow-yellow-500/30' : 'border-cyan-400/40' }} hover:shadow-2xl transition-all duration-300 group transform hover:-translate-y-1">
                                <div class="p-8">
                                    <div class="flex items-center justify-between mb-6 gap-6">
                                        <div class="flex items-center gap-6 flex-1 min-w-0">
                                            @if($isLeading)
                                                <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-full flex items-center justify-center shadow-lg flex-shrink-0 animate-bounce">
                                                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                    </svg>
                                                </div>
                            @endif

                            <!-- Candidate Photo -->
                            <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-slate-700 to-slate-800 rounded-2xl overflow-hidden shadow-md group-hover:scale-110 transition-transform duration-300 border border-cyan-400/30">
                                @if($candidate->imagepath)
                                    <img src="{{ asset('storage/' . $candidate->imagepath) }}" alt="{{ $candidate->firstname }} {{ $candidate->lastname }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-10 h-10 text-slate-500" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1 min-w-0">
                                <h3 class="text-2xl font-bold text-cyan-300 group-hover:text-cyan-200 transition-colors duration-300">
                                    {{ $candidate->firstname }} {{ $candidate->lastname }}
                                    @if($isLeading)
                                        <span class="ml-2 px-3 py-1 bg-yellow-500/30 text-yellow-300 text-sm font-bold rounded-full inline-block border border-yellow-400/50">Leading</span>
                                    @endif
                                </h3>
                                <p class="text-cyan-400/70 text-sm mt-1">{{ $position->title }}</p>
                                @if($candidate->description)
                                    <p class="text-cyan-200/70 text-sm mt-2 line-clamp-1">{{ $candidate->description }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Vote Count and Bar -->
                        <div class="flex flex-col items-end gap-3">
                            <div class="text-right">
                                <p class="text-4xl font-extrabold {{ $isLeading ? 'text-yellow-400' : 'text-cyan-300' }}">{{ $votes }}</p>
                                <p class="text-sm text-cyan-400/70 font-semibold">{{ $votes === 1 ? 'vote' : 'votes' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Vote Percentage Bar -->
                    <div class="mt-6 space-y-3 px-8 pb-8">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-cyan-300">Vote Share</span>
                            <span class="text-sm font-bold {{ $isLeading ? 'text-yellow-400' : 'text-cyan-400' }}">{{ $percentage }}%</span>
                        </div>
                        <div class="w-full h-3 bg-slate-700/80 rounded-full overflow-hidden shadow-inner border border-cyan-400/20">
                            <div class="h-full rounded-full transition-all duration-1000 ease-out {{ $isLeading ? 'bg-gradient-to-r from-yellow-400 to-yellow-500 shadow-lg shadow-yellow-400/50' : 'bg-gradient-to-r from-cyan-500 to-cyan-600 shadow-lg shadow-cyan-400/50' }}" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Position Summary -->
        <div class="mt-8 bg-gradient-to-r from-cyan-900/30 to-blue-900/30 border-l-4 border-cyan-400 rounded-2xl p-6 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300">
            <div class="flex items-center justify-between gap-4 flex-wrap">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-cyan-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <span class="font-semibold text-cyan-300">Total Votes for <strong>{{ $position->title }}</strong>:</span>
                </div>
                <span class="text-3xl font-extrabold text-cyan-400">{{ $totalVotesForPosition }}</span>
            </div>
        </div>
    @else
        <div class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-3xl p-16 text-center">
            <svg class="w-20 h-20 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <p class="text-slate-500 font-semibold text-lg">No candidates for this position</p>
            <p class="text-slate-400 mt-2">Results will appear here once votes are cast</p>
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
        <h3 class="text-2xl font-bold text-indigo-200 mb-2">No Results Available</h3>
        <p class="text-indigo-300 text-lg">No positions or results are available yet. Please check back later.</p>
    </div>
@endforelse

<!-- Back to Home Button -->
<div class="mt-16 sm:mt-20 text-center">
    <a href="{{ route('welcome') }}" class="inline-flex items-center gap-3 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 active:from-cyan-700 active:to-blue-700 text-cyan-100 font-bold text-lg px-10 sm:px-12 py-4 sm:py-5 rounded-2xl shadow-xl shadow-cyan-500/50 hover:shadow-2xl hover:shadow-cyan-500/70 transform hover:scale-105 active:scale-95 transition-all duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
        Back to Home
    </a>
</div>
</div>
</div>
@endsection
