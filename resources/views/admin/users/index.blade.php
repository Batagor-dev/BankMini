<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
@extends('admin.layout')

@section('content')
<div class="p-4 dark:text-white">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Manajemen User</h1>
        <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Tambah User
        </a>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Username</th>
                    <th class="px-4 py-2">NIS</th>
                    <th class="px-4 py-2">Jurusan</th>
                    <th class="px-4 py-2">Kelas</th>
                    <th class="px-4 py-2">Saldo</th>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                @if ($user->role === 'user')
                <tr class="border-b dark:border-gray-600">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->username }}</td>
                    <td class="px-4 py-2">{{ $user->nis }}</td>
                    <td class="px-4 py-2">{{ $user->jurusan }}</td>
                    <td class="px-4 py-2">{{ $user->kelas }}</td>
                    <td class="px-4 py-2">Rp{{ number_format($user->saldo, 2) }}</td>
                    <td class="px-4 py-2">{{ $user->role }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection



</body>
</html>
