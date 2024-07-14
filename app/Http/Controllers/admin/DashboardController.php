<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Commission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $deposits = Deposit::where('status', 'pending')->get();
        return view('admin.dashboard',compact('deposits'));
    }

     // Approve a deposit and update the user's wallet balance
     public function approve($id)
     {
         $deposit = Deposit::findOrFail($id);
         $user = User::where('username', $deposit->username)->firstOrFail();
 
         if ($deposit->status != 'approved') {
             $deposit->status = 'approved';
             $deposit->save();
 
             $wallet = $user->wallet;
             $wallet->balance += $deposit->amount;
             $wallet->save();
 
             // Process commission for the referrer if exists
             if ($user->upline) {
                 $referrer = User::where('username', $user->upline)->first();
                 if ($referrer) {
                     $commissionAmount = $deposit->amount * 0.05;
 
                     Commission::create([
                         'username' => $referrer->username,
                         'referral_username' => $user->username,
                         'commission_amount' => $commissionAmount,
                     ]);
 
                     $referrerWallet = $referrer->wallet;
                     $referrerWallet->balance += $commissionAmount;
                     $referrerWallet->save();
                 }
             }
 
             return redirect()->route('admin.dashboard')->with('message', 'Deposit approved and funds added to wallet.');
         }
 
         return redirect()->route('admin.dashboard')->with('error', 'Deposit already approved.');
     }
 
     // Reject a deposit
     public function reject($id)
     {
         $deposit = Deposit::findOrFail($id);
         if ($deposit->status != 'approved') {
             $deposit->status = 'rejected';
             $deposit->save();
             return redirect()->route('admin.deposits')->with('message', 'Deposit rejected.');
         }
         return redirect()->route('admin.deposits')->with('error', 'Approved deposits cannot be rejected.');
     }



}
