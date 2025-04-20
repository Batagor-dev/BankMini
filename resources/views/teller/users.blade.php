@extends('teller.layout')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Semua User</h1>

    <!-- Tabel User -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="p-4">Username</th>
                    <th class="p-4">NIS</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Saldo</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-100 transition duration-300">
                        <td class="p-4">{{ $user->username }}</td>
                        <td class="p-4">{{ $user->nis }}</td>
                        <td class="p-4">{{ $user->name }}</td>
                        <td class="p-4 font-semibold text-green-500">
                            Rp {{ number_format($user->saldo, 0, ',', '.') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 p-6">Belum ada user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $users->links('pagination::tailwind') }}
    </div>
</div>
@endsection