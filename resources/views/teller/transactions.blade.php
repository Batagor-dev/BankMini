@extends('teller.layout')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-semibold mb-4">Riwayat Transaksi</h1>

    <!-- Filter Tanggal dan Export -->
    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('teller.transactions') }}" method="GET" class="flex items-center space-x-2">
            <label for="date" class="text-sm font-semibold">Tanggal:</label>
            <input type="date" id="date" name="date" value="{{ request('date', now()->toDateString()) }}" class="p-2 border rounded">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Filter
            </button>
        </form>

        <form action="{{ route('teller.transactions.export') }}" method="GET" class="flex items-center space-x-2">
            <input type="date" id="export_date" name="date" value="{{ request('date', now()->toDateString()) }}" class="p-2 border rounded">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Export to Excel
            </button>
        </form>
    </div>

    <!-- Tabel Transaksi -->
    <div class="bg-white rounded-lg shadow-lg p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Username</th>
                    <th class="p-2 border">NIS</th>
                    <th class="p-2 border">Deskripsi</th>
                    <th class="p-2 border">Jumlah</th>
                    <th class="p-2 border">Tanggal</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <td class="p-2 border">{{ $transaction->user->username }}</td>
                        <td class="p-2 border">{{ $transaction->user->nis }}</td>
                        <td class="p-2 border">{{ $transaction->description }}</td>
                        <td class="p-2 border {{ $transaction->amount > 0 ? 'text-green-500' : 'text-red-500' }}">
                            {{ $transaction->amount > 0 ? '+' : '-' }}Rp {{ number_format(abs($transaction->amount), 0, ',', '.') }}
                        </td>
                        <td class="p-2 border">{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                        <td class="p-2 border">
                            <form action="{{ route('teller.transactions.destroy', $transaction->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 p-4">Belum ada transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $transactions->links() }}
    </div>
</div>
@endsection