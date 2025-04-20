@extends('user.layout')

@section('content')
<div class="p-4 bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-xl font-bold">Hi, {{ $user->name }}!</h1>
            <p class="text-gray-500 text-xs">Ayo Menabung, karena menabung sila ke 5</p>
        </div>
        <!-- Tombol Complaints -->
        <a href="{{ route('user.complaints.create') }}" 
           class="flex items-center bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg px-4 py-2 shadow hover:from-blue-600 hover:to-blue-800 transition">
            <i class="ph ph-chat-circle-dots text-xl mr-2"></i>
            <span class="text-sm font-semibold">Complaints</span>
        </a>
    </div>

    <!-- Card ATM -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow-lg p-6 mb-6 relative overflow-hidden">
        <!-- Header Card -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">SIMANTAB</h2>
            <span class="text-sm bg-blue-600 px-2 py-1 rounded-full shadow">Active</span>
        </div>

        <!-- Saldo dan Dekorasi -->
        <div class="relative">
            <!-- Dekorasi Lingkaran -->
            <div class="absolute top-0 left-0 w-24 h-24 bg-blue-400 opacity-30 rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-32 h-32 bg-blue-600 opacity-20 rounded-full"></div>
            <div class="absolute bottom-4 right-4 w-20 h-20 bg-blue-300 opacity-10 rounded-full"></div>

            <!-- Informasi Saldo -->
            <div class="relative z-10">
                <p class="text-sm mb-1">Saldo Anda</p>
                <div class="text-4xl font-bold">Rp {{ number_format($user->saldo, 0, ',', '.') }}</div>
            </div>
        </div>

        <!-- Informasi Tambahan -->
        <div class="flex justify-between items-center mt-6 relative z-10">
            <p class="text-sm">NIS: <span class="font-semibold">{{ $user->nis }}</span></p>
        </div>
    </div>


<!-- Navigasi Utama -->
<div class="grid grid-cols-4 gap-4 text-center mb-6">
    <a href="{{ route('user.transactions') }}" class="flex flex-col items-center bg-white text-gray-700 rounded-lg p-4 shadow hover:bg-gray-100">
        <i class="ph ph-currency-circle-dollar text-2xl"></i>
        <div class="text-xs mt-1">Transaction</div>
    </a>
    <a href="{{ route('user.account') }}" class="flex flex-col items-center bg-white text-gray-700 rounded-lg p-4 shadow hover:bg-gray-100">
        <i class="ph ph-user text-2xl"></i>
        <div class="text-xs mt-1">Account</div>
    </a>
    <a href="{{ route('user.about') }}" class="flex flex-col items-center bg-white text-gray-700 rounded-lg p-4 shadow hover:bg-gray-100">
        <i class="ph ph-buildings text-2xl"></i>
        <div class="text-xs mt-1">About Us</div>
    </a>
    <a href="{{ route('logout') }}" class="flex flex-col items-center bg-white text-gray-700 rounded-lg p-4 shadow hover:bg-gray-100"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ph ph-sign-out text-2xl"></i>
        <div class="text-xs mt-1">Logout</div>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</div>

    <!-- Riwayat Transaksi -->
    <div>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-base font-bold text-gray-800">Transaction</h2>
            <a href="{{ route('user.transactions') }}" class="text-blue-500 text-xs font-semibold">View All</a>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-4">
            @forelse ($transactions as $transaction)
                <div class="flex justify-between items-center mb-4 rounded-lg p-2 bg-gray-50 hover:bg-gray-100 transition">
                    <div>
                        <div class="font-semibold text-sm">{{ $transaction->user->name ?? 'N/A' }}</div>
                        <div class="text-xs text-gray-500">{{ $transaction->created_at->format('d/m/Y') }}</div>
                        <div class="text-xs text-green-500">{{ $transaction->description }}</div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-bold {{ $transaction->amount > 0 ? 'text-green-500' : 'text-red-500' }}">
                            Rp {{ number_format(abs($transaction->amount), 0, ',', '.') }}
                        </div>
                        <div class="text-xs text-gray-500">{{ $transaction->amount > 0 ? 'Debit' : 'Kredit' }}</div>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500 text-sm">Belum ada transaksi.</div>
            @endforelse
        </div>
    </div>
</div>

<!-- Script untuk Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data untuk Grafik Menabung
    const savingData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], // Ganti dengan data bulan Anda
        datasets: [{
            label: 'Saldo Ditabung',
            data: [50000, 75000, 100000, 125000, 150000, 175000], // Ganti dengan data saldo Anda
            borderColor: '#4F46E5',
            backgroundColor: 'rgba(79, 70, 229, 0.2)',
            tension: 0.4,
            fill: true,
        }]
    };

    // Konfigurasi Grafik Menabung
    const savingConfig = {
        type: 'line',
        data: savingData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
            },
        },
    };

    // Render Grafik Menabung
    const savingChart = new Chart(
        document.getElementById('savingChart'),
        savingConfig
    );
</script>
@endsection