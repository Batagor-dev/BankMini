@extends('admin.layout')

@section('content')
<div class="p-4 dark:text-white">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Manajemen Teller</h1>
        <a href="{{ route('admin.tellers.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Tambah Teller
        </a>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Username</th>
                    <th class="px-4 py-2">Jurusan</th>
                    <th class="px-4 py-2">Kelas</th>
                   
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tellers as $teller)
                <tr class="border-b dark:border-gray-600">
                    <td class="px-4 py-2">{{ $teller->name }}</td>
                    <td class="px-4 py-2">{{ $teller->username }}</td>
                    <td class="px-4 py-2">{{ $teller->jurusan }}</td>
                    <td class="px-4 py-2">{{ $teller->kelas }}</td>
                
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.tellers.edit', $teller->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('admin.tellers.destroy', $teller->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus teller ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection