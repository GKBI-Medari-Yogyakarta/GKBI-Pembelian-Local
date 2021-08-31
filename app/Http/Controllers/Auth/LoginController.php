<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return \view('auth.login');
    }
    public function formLogin(Request $request)
    {
        \request()->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return \redirect()->route('admin-unit.index');
        } elseif (Auth::guard('pemesan')->attempt($credentials)) {
            return \redirect()->route('permintaan-pembelian.index');
        } elseif (Auth::guard('gudang')->attempt($credentials)) {
            return \redirect()->route('bd.index');
        } elseif (Auth::guard('pembelian')->attempt($credentials)) {
            return \redirect()->route('transaction.index');
        } elseif (Auth::guard('akuntansi')->attempt($credentials)) {
            return \redirect()->route('rekening.index');
        } else {
            return \redirect()->back()->with(['warning' => 'akun tidak ditemukan. silahkan request akun ke IT Support!!']);
        }
    }
    //to logout all user
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return \redirect()->route('login.index');
    }
}
