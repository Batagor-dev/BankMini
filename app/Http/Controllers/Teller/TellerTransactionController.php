<?php

namespace App\Http\Controllers\Teller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

class TellerTransactionController extends Controller
{
    // Halaman Debit
    public function debit()
    {
        return view('teller.debit');
    }

    // Proses Debit
    public function storeDebit(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'nis' => 'required|exists:users,nis',
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
        ]);

        $user = User::where('username', $request->username)
            ->where('nis', $request->nis)
            ->firstOrFail();

        // Tambahkan saldo ke user
        $user->saldo += $request->amount;
        $user->save();

        // Simpan transaksi
        Transaction::create([
            'user_id' => $user->id,
            'teller_id' => auth()->id(), // ID teller yang sedang login
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        return redirect()->route('teller.debit')->with('success', 'Saldo berhasil ditambahkan.');
    }

    // Halaman Kredit
    public function credit()
    {
        return view('teller.credit');
    }

    // Proses Kredit
    public function storeCredit(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'nis' => 'required|exists:users,nis',
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
        ]);

        $user = User::where('username', $request->username)
            ->where('nis', $request->nis)
            ->firstOrFail();

        // Kurangi saldo user
        if ($user->saldo < $request->amount) {
            return redirect()->back()->withErrors(['amount' => 'Saldo tidak mencukupi.']);
        }

        $user->saldo -= $request->amount;
        $user->save();

        // Simpan transaksi
        Transaction::create([
            'user_id' => $user->id,
            'teller_id' => auth()->id(), // ID teller yang sedang login
            'description' => $request->description,
            'amount' => -$request->amount,
        ]);

        return redirect()->route('teller.credit')->with('success', 'Saldo berhasil dikurangi.');
    }

    // Halaman Riwayat Transaksi
    public function index()
    {
        $transactions = Transaction::with('user')->orderBy('created_at', 'desc')->paginate(10);

        return view('teller.transactions', compact('transactions'));
    }

    // Hapus Transaksi
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('teller.transactions')->with('success', 'Transaksi berhasil dihapus.');
    }
}