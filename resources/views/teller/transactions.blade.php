@extends('teller.layout')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Transaksi</h1>

        {{-- Filter, Search, Export --}}
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
            {{-- Filter Form --}}
            <form action="{{ route('teller.transactions') }}" method="GET" class="flex items-center gap-2">
                <label for="date" class="text-sm font-semibold text-gray-700">Tanggal:</label>
                <input type="date" id="date" name="date" value="{{ request('date', now()->toDateString()) }}"
                    class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Filter
                </button>
            </form>

            {{-- Search Form --}}
            <form action="{{ route('teller.transactions') }}" method="GET" class="flex items-center gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari"
                    class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Cari
                </button>
            </form>

            {{-- Export Form --}}
            <form action="{{ route('teller.transactions.export') }}" method="GET" class="flex items-center gap-2">
                <input type="date" id="export_date" name="date" value="{{ request('date', now()->toDateString()) }}"
                    class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    Export to Excel
                </button>
            </form>
        </div>

        {{-- Tabel Transaksi --}}
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="p-4">Username</th>
                        <th class="p-4">Nama</th>
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
                            <td class="p-4">{{ $transaction->user->name }}</td>
                            <td class="p-4">{{ $transaction->user->nis }}</td>
                            <td class="p-4">{{ $transaction->description }}</td>
                            <td class="p-4 font-semibold {{ $transaction->amount > 0 ? 'text-green-500' : 'text-red-500' }}">
                                {{ $transaction->amount > 0 ? '+' : '-' }}Rp
                                {{ number_format(abs($transaction->amount), 0, ',', '.') }}
                            </td>
                            <td class="p-4">{{ $transaction->created_at->format('d M Y') }}</td> {{-- Jam dihapus --}}
                            <td class="p-4">
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition duration-300"
                                    onclick="openDeleteModal({{ $transaction->id }}, '{{ $transaction->user->username }}', '{{ $transaction->description }}', '{{ number_format(abs($transaction->amount), 0, ',', '.') }}')">
                                    Hapus
                                </button>
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

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $transactions->links('pagination::tailwind') }}
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus --}}
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-xl">
            <h2 class="text-lg font-bold mb-4 text-red-600">Konfirmasi Hapus Transaksi</h2>
            <p class="mb-2">Apakah Anda yakin ingin menghapus transaksi berikut?</p>
            <ul class="text-sm text-gray-700 mb-4">
                <li><strong>Username:</strong> <span id="modal-username"></span></li>
                <li><strong>Deskripsi:</strong> <span id="modal-description"></span></li>
                <li><strong>Jumlah:</strong> Rp <span id="modal-amount"></span></li>
            </ul>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-end gap-2">
                    <button type="button"
                        onclick="closeDeleteModal()"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                        Ya, Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script --}}
    <script>
        function openDeleteModal(id, username, description, amount) {
            document.getElementById('modal-username').textContent = username;
            document.getElementById('modal-description').textContent = description;
            document.getElementById('modal-amount').textContent = amount;
            document.getElementById('deleteForm').action = '/teller/transactions/' + id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
