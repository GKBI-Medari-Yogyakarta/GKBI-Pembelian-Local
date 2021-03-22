<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //to index admin
    public function index() {
            return \view('admin.index');
    }
    //to logout all user
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login'); //routing login
    }
}
