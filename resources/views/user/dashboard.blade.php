@extends('user.layout')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="text-center mb-6">
        <h1 class="text-xl font-semibold">Halo {{ $user->name }}, Selamat Pagi</h1>
    </div>

    <!-- Card ATM -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow-lg p-6 mb-6">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">Saldo</h2>
            <div class="bg-orange-500 w-8 h-8 rounded-full"></div>
        </div>
        <div class="text-3xl font-bold my-4">Rp {{ number_format($user->saldo, 0, ',', '.') }}</div>
        <div class="text-sm">NIS: {{ $user->nis }}</div>
    </div>

    <!-- Button Navigasi -->
    <div class="grid grid-cols-4 gap-4 text-center mb-6">
        <a href="{{ route('user.transactions') }}" class="bg-pink-500 text-white rounded-lg p-4 shadow hover:bg-pink-600">
            <div class="text-sm">Transactions</div>
        </a>
        <a href="{{ route('user.account') }}" class="bg-yellow-500 text-white rounded-lg p-4 shadow hover:bg-yellow-600">
            <div class="text-sm">Akun</div>
        </a>
        <a href="{{ route('user.about') }}" class="bg-blue-500 text-white rounded-lg p-4 shadow hover:bg-blue-600">
            <div class="text-sm">About Us</div>
        </a>
        <a href="{{ route('logout') }}" class="bg-green-500 text-white rounded-lg p-4 shadow hover:bg-green-600"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="text-sm">Logout</div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

    <!-- Riwayat Transaksi -->
    <div>
        <h2 class="text-lg font-semibold mb-4">Riwayat Transaksi</h2>
        <div class="bg-white rounded-lg shadow-lg p-4">
            @forelse ($transactions as $transaction)
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <div class="font-semibold">{{ $transaction->description }}</div>
                        <div class="text-sm text-gray-500">{{ $transaction->created_at->format('d M Y, H:i') }}</div>
                    </div>
                    <div class="{{ $transaction->amount > 0 ? 'text-green-500' : 'text-red-500' }}">
                        {{ $transaction->amount > 0 ? '+' : '-' }}Rp {{ number_format(abs($transaction->amount), 0, ',', '.') }}
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500">Belum ada transaksi.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection