@extends('user.layout')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-semibold mb-4">Form Keluhan</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('user.complaints.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block mb-1">Nama</label>
            <input type="text" id="name" name="name" required class="w-full p-2 rounded border">
        </div>
        <div>
            <label for="email" class="block mb-1">Email</label>
            <input type="email" id="email" name="email" required class="w-full p-2 rounded border">
        </div>
        <div>
            <label for="message" class="block mb-1">Pesan</label>
            <textarea id="message" name="message" required class="w-full p-2 rounded border"></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Kirim
        </button>
    </form>
</div>
@endsection