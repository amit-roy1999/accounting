<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function view() {
        $user = auth()->user();
        $amountRecived = Transaction::where('receiver_id', $user->id)->with('sender')->get();
        $amountSend = Transaction::where('sender_id', $user->id)->with('recivers')->get();

        return view('dashboard',['amountRecived' => $amountRecived,'amountSend' => $amountSend]);
    }
}
