@extends('user.layout')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Tombol Back -->
    <div class="mb-6">
        <button onclick="history.back()" 
                class="flex items-center bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Back
        </button>
    </div>

    <h1 class="text-2xl font-bold text-gray-800 mb-6">Pengaturan Akun</h1>

    <!-- Notifikasi -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6 border border-green-300">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6 border border-red-300">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Update Nama -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Ubah Nama</h2>
        <form action="{{ route('user.account.updateName') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Baru</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                Simpan Perubahan
            </button>
        </form>
    </div>

    <!-- Form Update Password -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Ubah Password</h2>
        <form action="{{ route('user.account.updatePassword') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Password Lama</label>
                <input type="password" id="current_password" name="current_password" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div class="mb-4">
                <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                <input type="password" id="new_password" name="new_password" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" minlength="6">
            </div>
            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" minlength="6">
            </div>
            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection