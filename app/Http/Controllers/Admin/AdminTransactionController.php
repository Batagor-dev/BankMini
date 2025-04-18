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
        $date = $request->input('date');

        $transactions = Transaction::with(['user', 'teller'])
            ->when($date, function ($query, $date) {
                return $query->whereDate('created_at', $date);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.transactions', compact('transactions'));
    }

    public function export(Request $request)
    {
        $date = $request->input('date');
        $fileName = $date ? "transactions_{$date}.xlsx" : 'transactions_full.xlsx';

        return Excel::download(new TransactionsExport($date), $fileName);
    }
}