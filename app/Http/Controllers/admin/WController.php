<?php

namespace App\Http\Controllers\admin;
use App\Models\Withdraw;
use App\Models\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WController extends Controller
{
    public function index()
    {
        
        $withdrawRequests = Withdraw::where('status', 'pending')->get();
        return view('admin.withdrawalRequests',compact('withdrawRequests'));
    }

     // Approve or reject a withdrawal request
     public function update(Request $request, $id)
     {
         $withdraw = Withdraw::findOrFail($id);
 
         if ($request->action == 'approve') {
             $withdraw->status = 'approved';
         } elseif ($request->action == 'reject') {
             // Add the amount back to the user's wallet if rejected
             $withdraw->status = 'rejected';
             $wallet = Wallet::where('username', $withdraw->username)->first();
             if ($wallet) {
                 $wallet->balance += $withdraw->amount;
                 $wallet->save();
             }
         }
 
         $withdraw->save();
 
         return redirect()->route('admin.withdrawal')->with('success', 'Withdrawal request updated successfully.');
     }

}
