<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionsExport;

class AdminTransactionController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date', now()->toDateString());

        $transactions = Transaction::with(['teller', 'user'])
            ->whereDate('created_at', $date)
            ->paginate(10); // Menampilkan 10 transaksi per halaman

        return view('admin.transactions', compact('transactions'));
    }

    public function export(Request $request)
    {
        $date = $request->query('date'); // Ambil parameter tanggal dari URL
        $fileName = $date ? "transactions_{$date}.xlsx" : 'transactions_full.xlsx';

        return Excel::download(new TransactionsExport($date), $fileName);
    }
}