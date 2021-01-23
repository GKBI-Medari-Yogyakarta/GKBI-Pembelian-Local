<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminGudangController extends Controller
{
    //to dashboard user gudang
    public function index() {
        if (Auth::guard('gudang')->check()) {
            return \view('gudang.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
