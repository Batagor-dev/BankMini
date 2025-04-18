@extends('teller.layout')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-semibold mb-4">Kredit</h1>

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

    <!-- Form Kredit -->
    <form action="{{ route('teller.credit.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="username" class="block mb-1">Username</label>
            <input type="text" id="username" name="username" required class="w-full p-2 rounded border">
        </div>
        <div>
            <label for="nis" class="block mb-1">NIS</label>
            <input type="text" id="nis" name="nis" required class="w-full p-2 rounded border">
        </div>
        <div>
            <label for="amount" class="block mb-1">Jumlah Saldo</label>
            <input type="number" id="amount" name="amount" required class="w-full p-2 rounded border">
        </div>
        <div>
            <label for="description" class="block mb-1">Deskripsi</label>
            <textarea id="description" name="description" required class="w-full p-2 rounded border"></textarea>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Submit
        </button>
    </form>
</div>
@endsection