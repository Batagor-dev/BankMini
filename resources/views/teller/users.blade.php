@extends('teller.layout')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-semibold mb-4">Daftar Semua User</h1>

    <div class="bg-white rounded-lg shadow-lg p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Username</th>
                    <th class="p-2 border">NIS</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Saldo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="p-2 border">{{ $user->username }}</td>
                        <td class="p-2 border">{{ $user->nis }}</td>
                        <td class="p-2 border">{{ $user->name }}</td>
                        <td class="p-2 border">Rp {{ number_format($user->saldo, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 p-4">Belum ada user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection