@extends('user.layout')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-semibold mb-4">Riwayat Transaksi</h1>

    <div class="bg-white rounded-lg shadow-lg p-4">
        @forelse ($transactions as $transaction)
            <div class="flex justify-between items-center mb-4">
                <div>
                    <div class="font-semibold">{{ $transaction->description }}</div>
                    <div class="text-sm text-gray-500">{{ $transaction->created_at->format('d M Y, H:i') }}</div>
                </div>
                <div class="{{ $transaction->amount > 0 ? 'text-green-500' : 'text-red-500' }}">
                    {{ $transaction->amount > 0 ? '+' : '-' }}Rp {{ number_format(abs($transaction->amount), 0, ',', '.') }}
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500">Belum ada transaksi.</div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $transactions->links() }}
    </div>
</div>
@endsection