@extends('admin.layout')

@section('content')
<div class="p-4 dark:text-white">
    <h2 class="text-xl font-semibold mb-4">Reset Password</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mt-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.admins.reset-password') }}" method="POST" class="space-y-4 mt-4">
        @csrf
        <div>
            <label for="username" class="block mb-1">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan Username" required class="w-full p-2 rounded border">
        </div>
        <div>
            <label for="password" class="block mb-1">Password Baru</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password Baru" required class="w-full p-2 rounded border" minlength="6">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Reset Password
        </button>
    </form>
</div>
@endsection