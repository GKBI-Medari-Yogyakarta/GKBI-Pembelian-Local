<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAkuntansiController extends Controller
{
    //to dashboard user akuntansi
    public function index() {
        if (Auth::guard('akuntansi')->check()) {
            return \view('akuntansi.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
