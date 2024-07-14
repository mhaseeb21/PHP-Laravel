<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {

         // Get the logged-in user's username
         $user = Auth::user();

         // Fetch the wallet balance for the user
         $wallet = Wallet::where('username', $user->username)->first();

         $withdrawals = Withdraw::where('username', $user->username)->orderBy('created_at', 'desc')->get();

        return view('dashboard.wallet', compact('wallet', 'withdrawals'));        
    }



    







}
