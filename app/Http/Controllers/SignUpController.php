<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Commission;
use App\Models\Wallet;

use App\Models\User; 

use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index()
    {
        return view('frontend.signUp');
    }

    public function register(Request $request)
    {
    // Define validation rules
    $validator = Validator::make($request->all(), [
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users|max:255',
        'referral_code' => 'nullable|string|max:255',
        'gender' => 'required|in:male,female,other',
        'password' => 'required|confirmed|min:8',
         
    ]);

        // Check if validation passes
        if ($validator->passes()) 
        {
            // Create a new user
            $user = new User();
                $user->firstname = $request->firstName;
                $user->lastName = $request->lastName;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->referral_code = $request->referral_code;
                $user->gender = $request->gender;
                $user->password = Hash::make($request->password);
                $user->save();


                  // Set upline to the referral code if provided
            $user->upline = $request->referral_code;
            $user->save();

            // Create a wallet for the user
            Wallet::create([
                'username' => $user->username,
                'balance' => 0.00,
            ]);

            // Create a commission record if there is an upline
                Commission::create([
                    'username' => $user->username,
                    'referral_username' => $user->upline,
                    'commission_amount' => 0.00, // Initial commission amount
                ]);
            

                return redirect()->route('account.login')->with('success','You have registered successfully.');
        }
            else 
                {
                return redirect()->route('account.register')->with('error', 'Either email or password is incorrect.');
                }
    } 
    
}
