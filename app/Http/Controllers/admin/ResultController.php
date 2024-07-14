<?php

namespace App\Http\Controllers\admin;
use App\Models\Result;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        return view('admin.signal');
    }

    public function store(Request $request)
    {
        $request->validate([
            'result' => 'required|in:buy,sell',
        ]);

        Result::create([
            'result' => $request->result,
        ]);

        return redirect()->back()->with('success', 'Result set successfully!');
    }
}
