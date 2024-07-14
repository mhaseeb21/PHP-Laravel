<?php

namespace App\Http\Controllers;
use App\Models\Deposit;

use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        return view('dashboard.deposit');
    }

    // Store a new deposit request
    public function store(Request $request)
    {
        $request->validate([
            'txid' => 'required|unique:deposits,transaction_id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $user = auth()->user(); // Assuming the user is authenticated

        $deposit = Deposit::create([
            'username' => $user->username,
            'transaction_id' => $request->txid,
            'amount' => $request->amount,
        ]);

        return redirect()->back()->with('message', 'Deposit request created successfully and pending approval.');
    }


}
