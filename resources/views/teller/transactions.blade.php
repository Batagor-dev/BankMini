@extends('teller.layout')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Transaksi</h1>

        <!-- Filter Tanggal, Export, dan Pencarian -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
            <!-- Filter Form -->
            <form action="{{ route('teller.transactions') }}" method="GET" class="flex items-center gap-2">
                <label for="date" class="text-sm font-semibold text-gray-700">Tanggal:</label>
                <input type="date" id="date" name="date" value="{{ request('date', now()->toDateString()) }}"
                    class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Filter
                </button>
            </form>

            <!-- Pencarian Form -->
            <form action="{{ route('teller.transactions') }}" method="GET" class="flex items-center gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Username/NIS"
                    class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Cari
                </button>
            </form>

            <!-- Export Form -->
            <form action="{{ route('teller.transactions.export') }}" method="GET" class="flex items-center gap-2">
                <input type="date" id="export_date" name="date" value="{{ request('date', now()->toDateString()) }}"
                    class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    Export to Excel
                </button>
            </form>
        </div>

        <!-- Tabel Transaksi -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="p-4">Username</th>
                        <th class="p-4">NIS</th>
                        <th class="p-4">Deskripsi</th>
                        <th class="p-4">Jumlah</th>
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($transactions as $transaction)
                        <tr class="hover:bg-gray-100 transition duration-300">
                            <td class="p-4">{{ $transaction->user->username }}</td>
                            <td class="p-4">{{ $transaction->user->nis }}</td>
                            <td class="p-4">{{ $transaction->description }}</td>
                            <td class="p-4 font-semibold {{ $transaction->amount > 0 ? 'text-green-500' : 'text-red-500' }}">
                                {{ $transaction->amount > 0 ? '+' : '-' }}Rp
                                {{ number_format(abs($transaction->amount), 0, ',', '.') }}
                            </td>
                            <td class="p-4">{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                            <td class="p-4">
                                <form action="{{ route('teller.transactions.destroy', $transaction->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition duration-300">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 p-6">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $transactions->links('pagination::tailwind') }}
        </div>
    </div>
@endsection