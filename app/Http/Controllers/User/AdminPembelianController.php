<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPembelianController extends Controller
{
    //to dashboard user pembelian
    public function index() {
        if (Auth::guard('pembelian')->check()) {
            return \view('pembelian.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
