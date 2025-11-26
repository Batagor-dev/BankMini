@extends('teller.layout')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Form Kredit</h1>

    <!-- Notifikasi -->
    @if (session('success'))
        <div class="mb-6 p-4 rounded border border-green-300 bg-green-100 text-green-700 text-sm max-w-4xl">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 p-4 rounded border border-red-300 bg-red-100 text-red-700 text-sm max-w-4xl">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teller.credit.store') }}" method="POST" class="space-y-6 max-w-4xl">
        @csrf

        <div>
            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
            <input type="text" id="username" name="username" required
                class="w-full rounded-md border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
            <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">NIS</label>
            <input type="text" id="nis" name="nis" required
                class="w-full rounded-md border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Saldo</label>
            <input type="text" id="amount" name="amount" required inputmode="numeric"
                class="w-full rounded-md border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea id="description" name="description" rows="4" required
                class="w-full rounded-md border border-gray-300 px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white font-semibold py-3 rounded-md hover:bg-blue-700 transition duration-300">
            Submit
        </button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const amountInput = document.getElementById('amount');

        amountInput.addEventListener('input', () => {
            let cleanValue = amountInput.value.replace(/\D/g, '');
            amountInput.value = cleanValue ? Number(cleanValue).toLocaleString('id-ID') : '';
        });

        amountInput.form.addEventListener('submit', () => {
            amountInput.value = amountInput.value.replace(/\./g, '');
        });
    });
</script>
@endsection
