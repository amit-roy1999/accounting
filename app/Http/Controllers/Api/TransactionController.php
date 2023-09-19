<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function sendMony(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'amount' => 'required|decimal:2',
        ]);
        if ($request->user()->email == $request->email) {
            return response()->json([
                'status' => false,
                'message' => 'Self transfer not avalebel',
            ], 401);
        }
        $reciverAccount = User::whereEmail($request->email)->first();
        Transaction::create([
            'sender_id' => $request->user()->id,
            'receiver_id' => $reciverAccount->id,
            'amount' => $request->amount,
        ]);

        return response()->json([
            'status' => true,
            'message' => $reciverAccount->email . ' has recived ' .$request->amount. ' sucsessfully.',
        ], 200);
    }
}
