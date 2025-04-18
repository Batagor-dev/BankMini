@extends('admin.layout')

@section('content')
<div class="p-4 dark:text-white">
    <h2 class="text-xl font-semibold mb-4">Edit Teller</h2>

    <!-- Tombol Kembali -->
    <a href="{{ route('admin.tellers.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Kembali
    </a>

    <!-- Tampilkan error validasi -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit Teller -->
    <form action="{{ route('admin.tellers.update', $teller->id) }}" method="POST" class="space-y-4 mt-4">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block mb-1">Nama</label>
            <input type="text" id="name" name="name" value="{{ $teller->name }}" placeholder="Nama Lengkap" required class="w-full p-2 rounded border" maxlength="100">
        </div>
        <div>
            <label for="username" class="block mb-1">Username</label>
            <input type="text" id="username" name="username" value="{{ $teller->username }}" placeholder="Username" required class="w-full p-2 rounded border" maxlength="50">
        </div>
        <div>
            <label for="jurusan" class="block mb-1">Jurusan (Opsional)</label>
            <input type="text" id="jurusan" name="jurusan" value="{{ $teller->jurusan }}" placeholder="Jurusan" class="w-full p-2 rounded border">
        </div>
        <div>
            <label for="kelas" class="block mb-1">Kelas (Opsional)</label>
            <input type="text" id="kelas" name="kelas" value="{{ $teller->kelas }}" placeholder="Kelas" class="w-full p-2 rounded border">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection