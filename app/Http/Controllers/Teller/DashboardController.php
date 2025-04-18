<?php
namespace App\Http\Controllers\Teller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $teller = Auth::user(); // Ambil data teller yang sedang login

        // Hitung total saldo
        $totalSaldo = Transaction::sum('amount');

        // Hitung saldo harian (transaksi hari ini)
        $dailySaldo = Transaction::whereDate('created_at', now()->toDateString())->sum('amount');

        // Ambil 5 riwayat transaksi terakhir
        $transactions = Transaction::orderBy('created_at', 'desc')->take(5)->get();

        return view('teller.dashboard', compact('teller', 'totalSaldo', 'dailySaldo', 'transactions'));
    }

    public function users()
    {
        // Ambil hanya user dengan role 'user'
        $users = User::where('role', 'user')->paginate(10);

        return view('teller.users', compact('users'));
    }
}