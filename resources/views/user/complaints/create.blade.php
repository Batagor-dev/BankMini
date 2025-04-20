@extends('user.layout')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Form Keluhan</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.complaints.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <input type="text" id="name" name="name" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Pesan -->
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                <textarea id="message" name="message" rows="5" required 
                          class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>

            <!-- Tombol Kirim -->
            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                Kirim Keluhan
            </button>
        </form>
    </div>
</div>
@endsection