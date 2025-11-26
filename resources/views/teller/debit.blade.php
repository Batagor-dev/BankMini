@extends('teller.layout')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-6"> {{-- Hapus max-w agar full width --}}
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Form Debit</h1>

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

        <!-- Form Debit -->
        <form action="{{ route('teller.debit.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input type="text" id="username" name="username" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                       autocomplete="username">
            </div>

            <!-- NIS -->
            <div>
                <label for="nis" class="block text-sm font-medium text-gray-700 mb-2">NIS</label>
                <input type="text" id="nis" name="nis" required 
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       autocomplete="off">
            </div>

            <!-- Jumlah Saldo -->
            <div>
                <label for="amount_display" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Saldo</label>
                <input type="text" id="amount_display" required
                       class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Contoh: 1.000.000" autocomplete="off" inputmode="numeric" />
                <input type="hidden" name="amount" id="amount">
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea id="description" name="description" rows="4" required 
                          class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none resize-none"></textarea>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                Submit
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const displayInput = document.getElementById('amount_display');
    const hiddenInput = document.getElementById('amount');

    displayInput.addEventListener('input', (e) => {
        let cursorPos = displayInput.selectionStart;
        let originalLength = displayInput.value.length;

        // Hapus semua karakter kecuali angka
        let rawValue = displayInput.value.replace(/\D/g, '');
        hiddenInput.value = rawValue;

        // Format ribuan dengan titik
        if (rawValue) {
            let formatted = rawValue.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            displayInput.value = formatted;

            let newLength = formatted.length;
            cursorPos = cursorPos + (newLength - originalLength);
            displayInput.setSelectionRange(cursorPos, cursorPos);
        } else {
            displayInput.value = '';
        }
    });
});
</script>

@endsection
