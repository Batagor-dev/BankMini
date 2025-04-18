@extends('user.layout')

@section('content')
<div class="p-6">
    <!-- Tombol Back -->
    <div class="mb-4">
        <button onclick="history.back()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Back
        </button>
    </div>

    <h1 class="text-xl font-semibold mb-4">Pengaturan Akun</h1>

    <!-- Notifikasi -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Update Nama -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Ubah Nama</h2>
        <form action="{{ route('user.account.updateName') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block mb-1">Nama Baru</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required class="w-full p-2 rounded border">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </form>
    </div>

    <!-- Form Update Password -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Ubah Password</h2>
        <form action="{{ route('user.account.updatePassword') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="current_password" class="block mb-1">Password Lama</label>
                <input type="password" id="current_password" name="current_password" required class="w-full p-2 rounded border">
            </div>
            <div class="mb-4">
                <label for="new_password" class="block mb-1">Password Baru</label>
                <input type="password" id="new_password" name="new_password" required class="w-full p-2 rounded border" minlength="6">
            </div>
            <div class="mb-4">
                <label for="new_password_confirmation" class="block mb-1">Konfirmasi Password Baru</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required class="w-full p-2 rounded border" minlength="6">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection