@extends('user.layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-blue-600 to-blue-800">
        <!-- Header with Floating Card Effect -->
        <div class="relative px-6 pt-8 pb-16 text-white">
            <!-- App Header -->
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center">


                    <h1 class="text-xl font-bold">SIMANTAB</h1>
                </div>
            <a href="{{ route('user.complaints.create') }}"
                class="flex items-center space-x-2 bg-gradient-to-br from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 text-blue-600 rounded-full px-4 py-2 shadow-sm hover:shadow-md transition-all duration-300 border border-blue-100">
                <i class="ph ph-headset text-lg"></i>
                {{-- <span class="text-sm font-medium">Customer Support</span> --}}
            </a>
            </div>

            <!-- Personalized Greeting -->
            <div class="text-center mb-8">
                <p class="text-lg opacity-90 mb-1">Hello,</p>
                <h2 class="text-3xl font-bold mb-2">{{ $user->name }}</h2>
                <div class="inline-flex items-center bg-white/10 px-4 py-1 rounded-full">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-sm">Active Account</span>
                </div>
            </div>

            <!-- Balance Card with Neumorphism Effect -->
            <div class="relative bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 shadow-lg 
                      border border-white/10 backdrop-blur-sm
                      hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/5 rounded-full -mr-6 -mt-6"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full -ml-8 -mb-8"></div>

                <div class="relative z-10">
                    <p class="text-sm opacity-80 mb-1">Your Balance</p>
                    <h3 class="text-4xl font-bold mb-6">Rp {{ number_format($user->saldo, 0, ',', '.') }}</h3>

                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs opacity-70">Account Number</p>
                            <p class="text-sm font-medium">{{ $user->nis }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="p-2 bg-white/10 hover:bg-white/20 rounded-full transition">
                                <i class="ph ph-arrow-down-left"></i>
                            </button>
                            <button class="p-2 bg-white/10 hover:bg-white/20 rounded-full transition">
                                <i class="ph ph-arrow-up-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions with Floating Icons -->
    <!-- Quick Actions with Floating Icons -->
    <div class="relative z-10 px-6 -mt-8 mb-8">
        <div class="grid grid-cols-4 gap-4">
            <a href="{{ route('user.dashboard') }}" class="flex flex-col items-center group">
                <div class="w-16 h-16 bg-white rounded-xl shadow-lg flex items-center justify-center 
                            group-hover:bg-blue-50 transition duration-300 mb-2">
                    <i class="ph ph-house text-2xl text-blue-600"></i>
                </div>
                <span class="text-white text-sm font-medium">Home</span>
            </a>
            {{-- <a href="{{ route('user.transactions') }}" class="flex flex-col items-center group">
                <div class="w-16 h-16 bg-white rounded-xl shadow-lg flex items-center justify-center 
                            group-hover:bg-blue-50 transition duration-300 mb-2">
                    <i class="ph ph-currency-circle-dollar text-blue-600 text-xl"></i>
                </div>
                <span class="text-white text-sm font-medium">Transactions</span>
            </a> --}}
            <a href="{{ route('user.account') }}" class="flex flex-col items-center group">
                <div class="w-16 h-16 bg-white rounded-xl shadow-lg flex items-center justify-center 
                            group-hover:bg-blue-50 transition duration-300 mb-2">
                    <i class="ph ph-user text-2xl text-blue-600"></i>
                </div>
                <span class="text-white text-sm font-medium">Account</span>
            </a>
            <a href="{{ route('user.about') }}" class="flex flex-col items-center group">
                <div class="w-16 h-16 bg-white rounded-xl shadow-lg flex items-center justify-center 
                            group-hover:bg-blue-50 transition duration-300 mb-2">
                    <i class="ph ph-buildings text-2xl text-blue-600"></i>
                </div>
                <span class="text-white text-sm font-medium">About</span>
            </a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="flex flex-col items-center group">
                <div class="w-16 h-16 bg-white rounded-xl shadow-lg flex items-center justify-center 
                            group-hover:bg-blue-50 transition duration-300 mb-2">
                    <i class="ph ph-sign-out text-2xl text-blue-600"></i>
                </div>
                <span class="text-white text-sm font-medium">Logout</span>
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

        <!-- Transaction History with Glass Panel -->
        <div class="bg-white rounded-t-3xl pt-8 pb-12 px-6 min-h-[50vh]">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Recent Transactions</h2>
                {{-- <a href="{{ route('user.transactions') }}" class="text-blue-600 text-sm flex items-center">
                    View All <i class="ph ph-arrow-right ml-1"></i>
                </a> --}}
            </div>

            <div class="space-y-3">
                @forelse ($transactions as $transaction)
                    <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm hover:shadow-md transition 
                                flex justify-between items-center">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 rounded-full flex items-center justify-center 
                                        {{ $transaction->amount > 0 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} mr-3">
                                <i class="ph ph-{{ $transaction->amount > 0 ? 'arrow-down-left' : 'arrow-up-right' }}"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ $transaction->description }}</p>
                                <p class="text-xs text-gray-500">{{ $transaction->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold {{ $transaction->amount > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $transaction->amount > 0 ? '+' : '-' }} Rp
                                {{ number_format(abs($transaction->amount), 0, ',', '.') }}
                            </p>
                            <p class="text-xs text-gray-500">{{ $transaction->user->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ph ph-wallet text-gray-400 text-2xl"></i>
                        </div>
                        <p class="text-gray-500">No transactions yet</p>
                        <p class="text-gray-400 text-sm mt-1">Your transactions will appear here</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection