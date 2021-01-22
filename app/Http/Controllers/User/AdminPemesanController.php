<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPemesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('pemesan')->check()) {
            return \view('pemesan.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
