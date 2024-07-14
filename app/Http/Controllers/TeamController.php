<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $wallet = Wallet::where('username', $user->username)->first();

        // Fetch referrals and their wallet amounts
        $referrals = User::where('referral_code', $user->username)
            ->with('wallet')
            ->get();

        return view('dashboard.team', compact('wallet', 'referrals'));
    }
}
