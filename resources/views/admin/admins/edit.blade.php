@extends('admin.layout')

@section('content')
<div class="p-4 dark:text-white">
    <h2 class="text-xl font-semibold mb-4">Edit Admin</h2>

    <a href="{{ route('admin.admins.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Kembali
    </a>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST" class="space-y-4 mt-4">
        @csrf
        @method('PUT')
        <div>
            <label for="username" class="block mb-1">Username</label>
            <input type="text" id="username" name="username" value="{{ $admin->username }}" required class="w-full p-2 rounded border" maxlength="50">
        </div>
        <div>
            <label for="password" class="block mb-1">Password (Opsional)</label>
            <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah" class="w-full p-2 rounded border" minlength="6">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection