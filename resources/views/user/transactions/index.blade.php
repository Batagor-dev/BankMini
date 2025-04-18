@extends('user.layout')

@section('content')
<div class="bg-[#3a7dff] min-h-screen">
    <!-- Header -->
    <div class="text-center text-white px-4 py-8">
        <div class="flex justify-between items-center px-4">
          <h2 class="text-xl font-bold">SIMANTAB</h2>
        </div>
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mt-4">Hi, {{ $user->name }}!</h1>
        <p class="text-lg sm:text-xl md:text-2xl mt-2">Saldo Anda</p>
        <div class="text-4xl sm:text-5xl md:text-6xl font-bold mt-2">Rp {{ number_format($user->saldo, 0, ',', '.') }}</div>
    </div>

    <!-- Navigasi -->
    <div class="grid grid-cols-4 gap-4 px-4 sm:px-6 mb-6">
        <a href="{{ route('user.transactions') }}" class="flex flex-col items-center space-y-2">
            <div class="bg-white text-gray-700 rounded-full w-16 h-16 sm:w-20 sm:h-20 shadow-md hover:bg-gray-200 flex items-center justify-center">
                <i class="ph ph-currency-circle-dollar text-3xl sm:text-4xl"></i>
            </div>
            <span class="text-white text-sm sm:text-base md:text-lg">Transaction</span>
        </a>
        <a href="{{ route('user.account') }}" class="flex flex-col items-center space-y-2">
            <div class="bg-white text-gray-700 rounded-full w-16 h-16 sm:w-20 sm:h-20 shadow-md hover:bg-gray-200 flex items-center justify-center">
                <i class="ph ph-user text-3xl sm:text-4xl"></i>
            </div>
            <span class="text-white text-sm sm:text-base md:text-lg">Account</span>
        </a>
        <a href="{{ route('user.about') }}" class="flex flex-col items-center space-y-2">
            <div class="bg-white text-gray-700 rounded-full w-16 h-16 sm:w-20 sm:h-20 shadow-md hover:bg-gray-200 flex items-center justify-center">
                <i class="ph ph-buildings text-3xl sm:text-4xl"></i>
            </div>
            <span class="text-white text-sm sm:text-base md:text-lg">About Us</span>
        </a>
        <a href="{{ route('logout') }}" class="flex flex-col items-center space-y-2"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="bg-white text-gray-700 rounded-full w-16 h-16 sm:w-20 sm:h-20 shadow-md hover:bg-gray-200 flex items-center justify-center">
                <i class="ph ph-sign-out text-3xl sm:text-4xl"></i>
            </div>
            <span class="text-white text-sm sm:text-base md:text-lg">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

    <!-- Riwayat Transaksi -->
    <div class="bg-white rounded-t-3xl pt-4 pb-8 px-4 h-full min-h-[calc(100vh-250px)]">
    <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-500 mb-4">Transaction</h2>
    <div class="space-y-3">
        @forelse ($transactions as $transaction)
            <div class="bg-[#3a7dff] text-white rounded-lg p-3 sm:p-4 flex justify-between items-center gap-2 sm:gap-4">
                <div>
                    <div class="font-semibold text-sm sm:text-base">{{ $transaction->user->name ?? 'N/A' }}</div>
                    <div class="text-xs sm:text-sm">{{ $transaction->created_at->format('d/m/Y') }}</div>
                </div>
                <div class="text-right">
                    <div class="text-base sm:text-lg font-bold">
                        Rp {{ number_format(abs($transaction->amount), 0, ',', '.') }}
                    </div>
                    <div class="text-xs sm:text-sm">{{ $transaction->amount > 0 ? 'Debit' : 'Kredit' }}</div>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 text-sm sm:text-base">Belum ada transaksi.</div>
        @endforelse
    </div>
</div>
</div>
@endsection