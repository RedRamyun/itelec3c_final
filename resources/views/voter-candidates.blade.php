@extends('layouts.voter')

@section('title', 'View Candidates - Student Election System')

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
                        <h1 class="text-xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Election System</h1>
                        <p class="text-xs text-cyan-300/70">Candidate Preview</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-semibold text-cyan-200">{{ session('voter_firstname') }} {{ session('voter_lastname') }}</p>
                        <p class="text-xs text-cyan-400/70">Registered Voter</p>
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
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
        <!-- Hero Section -->
        <div class="mb-16 sm:mb-20 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl shadow-2xl shadow-cyan-500/50 mb-6 mx-auto transform hover:scale-110 transition-transform duration-300">
                <svg class="w-8 h-8 text-cyan-100" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                </svg>
            </div>
            <h1 class="text-5xl sm:text-6xl font-extrabold bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent mb-4">Meet the Candidates</h1>
            <p class="text-lg sm:text-xl text-cyan-200/80 max-w-2xl mx-auto leading-relaxed">Review all candidates for each position. Get to know them before you cast your vote.</p>
        </div>

        <!-- Positions and Candidates -->
        @forelse($positions as $index => $position)
            <div class="mb-20">
                <!-- Position Header Card -->
<div class="bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-700 rounded-3xl shadow-2xl shadow-cyan-500/40 px-8 py-12 mb-10 relative overflow-hidden group hover:shadow-3xl hover:shadow-cyan-500/60 transition-all duration-500">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="inline-flex items-center justify-center w-10 h-10 bg-cyan-400/30 rounded-lg backdrop-blur-sm border border-cyan-300/50">
                            <span class="font-bold text-cyan-300 text-lg">{{ $index + 1 }}</span>
                        </div>
                        <span class="inline-block px-3 py-1 bg-cyan-400/20 rounded-full text-cyan-200 text-sm font-semibold backdrop-blur-sm border border-cyan-300/40">POSITION</span>
                    </div>
                    <h2 class="text-4xl font-bold text-cyan-300 mb-3 drop-shadow-lg">{{ $position->position_name }}</h2>
                    @if($position->description)
                        <p class="text-cyan-50 text-lg leading-relaxed drop-shadow-md">{{ $position->description }}</p>
                        @endif
                    </div>
                </div>

                <!-- Candidates Grid -->
                @if($position->candidates->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10">
                        @foreach($position->candidates as $candidate)
                            <div class="group rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl hover:shadow-cyan-500/30 transition-all duration-500 transform hover:scale-105 bg-gradient-to-br from-slate-800 to-slate-900 border-2 border-cyan-400/40 hover:border-cyan-300/80">
                                <!-- Candidate Photo -->
                                <div class="relative h-72 bg-gradient-to-br from-slate-700 to-slate-800 overflow-hidden">
                                    @if($candidate->imagepath)
                                        <img src="{{ asset('storage/' . $candidate->imagepath) }}" alt="{{ $candidate->candidate_name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-32 h-32 text-slate-300" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <!-- Overlay Badge -->
                                    <div class="absolute top-4 right-4">
                                        <span class="inline-block px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white text-sm font-bold rounded-full shadow-lg shadow-cyan-500/50 backdrop-blur-sm">
                                            CANDIDATE
                                        </span>
                                    </div>
                                </div>

                                <!-- Candidate Info -->
                                <div class="p-8">
                                    <h3 class="text-2xl font-bold text-cyan-300 mb-3 group-hover:text-cyan-200 transition-colors duration-300">{{ $candidate->candidate_name }}</h3>
                                    <p class="text-cyan-400 font-semibold mb-5 inline-block px-3 py-1 bg-cyan-500/20 border border-cyan-400/50 rounded-lg text-sm">{{ $position->position_name }}</p>
                                    
                                    <p class="text-slate-300 text-base leading-relaxed mb-6">{{ $candidate->party_affiliation }}</p>
                                    
                                    <!-- View Details Button -->
                                    <button class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 active:from-cyan-700 active:to-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-2xl hover:shadow-cyan-500/50 flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Learn More
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-slate-800/50 border-2 border-dashed border-cyan-400/30 rounded-3xl p-16 text-center">
                        <svg class="w-20 h-20 text-slate-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="text-slate-300 font-semibold text-lg">No candidates for this position yet</p>
                        <p class="text-slate-400 mt-2">Check back soon for updates</p>
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
                <h3 class="text-xl font-bold text-indigo-200 mb-2">No Positions Available</h3>
                <p class="text-indigo-300">No positions or candidates available at this time. Please check back later.</p>
            </div>
        @endforelse

        <!-- Proceed to Voting Button -->
        @if($positions->count() > 0)
            <div class="mt-16 sm:mt-20 flex justify-center">
                <a href="{{ route('voter.voting') }}" class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 active:from-cyan-700 active:to-blue-700 text-cyan-100 font-bold text-lg px-12 sm:px-14 py-5 sm:py-6 rounded-2xl shadow-2xl shadow-cyan-500/50 hover:shadow-3xl hover:shadow-cyan-500/70 transform hover:-translate-y-1 active:translate-y-0 transition-all duration-300">
                    <span>Ready to Vote</span>
                    <svg class="w-6 h-6 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
