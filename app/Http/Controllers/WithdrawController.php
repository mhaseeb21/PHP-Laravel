<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Withdraw;
use App\Models\Wallet;

use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        return view('dashboard.withdraw');
    }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'withdraw-address' => 'required|string',
            'amount' => 'required|numeric|min:50',
        ]);

        // Get the authenticated user's username
        $username = Auth::user()->username;

        // Check if the user has enough balance
        $wallet = Wallet::where('username', $username)->first();

        if (!$wallet || $wallet->balance < $request->amount) {
            return redirect()->back()->withErrors(['amount' => 'The withdrawal amount exceeds your available balance.']);
        }

        // Create a new withdrawal request
        $withdraw = new Withdraw();
        $withdraw->username = $username;
        $withdraw->amount = $request->amount;
        $withdraw->status = 'pending';
        $withdraw->save();

        // Deduct the amount from the user's wallet
        $wallet->balance -= $request->amount;
        $wallet->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Withdrawal request submitted successfully. Awaiting admin approval.');
    }

}
