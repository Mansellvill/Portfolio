<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccountRequest;
use App\User;

use App\Order;

class AccountController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('auth.accounts.index', compact('user'));
    }

    public function orders() {
        $orders = Auth::user()->order()->where('status', 1)->get();
        return view('auth.accounts.orders', compact('orders'));
    }

    public function edit() {
        $user = Auth::user();
        return view('auth.accounts.edit', compact('user'));
    }

    public function update(AccountRequest $request) {
        $user = Auth::user();
        if(is_null($user->full_name) and is_null($user->phone)) {
            $user->full_name = $request->full_name;
            $user->phone = $request->phone;
            $user->save();
        }
        $user->update($request->all());
        return redirect()->route('profil.index');
    }

    public function show(Order $order) {
        return view('auth.accounts.show', compact('order'));
    }
}
