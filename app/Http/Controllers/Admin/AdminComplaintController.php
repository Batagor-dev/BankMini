<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;

class AdminComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.complaints', compact('complaints'));
    }
}