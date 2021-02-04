<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //to index admin
    public function index() {
        if (Auth::check()) {
            return \view('admin.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to logout all user
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login'); //routing login
    }
}
