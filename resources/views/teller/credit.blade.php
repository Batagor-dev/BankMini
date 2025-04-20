@extends('teller.layout')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Form Kredit</h1>

        <!-- Notifikasi -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6 border border-green-300">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6 border border-red-300">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Kredit -->
        <form action="{{ route('teller.credit.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input type="text" id="username" name="username" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- NIS -->
            <div>
                <label for="nis" class="block text-sm font-medium text-gray-700 mb-2">NIS</label>
                <input type="text" id="nis" name="nis" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Jumlah Saldo -->
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Saldo</label>
                <input type="number" id="amount" name="amount" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea id="description" name="description" rows="4" required 
                          class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection