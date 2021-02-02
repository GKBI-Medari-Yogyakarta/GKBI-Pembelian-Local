<?php

namespace App\Http\Controllers\Niagabeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    //to index
    public function index() {
        if (Auth::guard('pembelian')->check()) {
            return \view('niagabeli.supplier.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function create() {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('supplier.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('supplier.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('supplier.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    public function edit($id) {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('supplier.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    public function update(Request $request, $id) {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('supplier.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }

    public function destroy($id) {
        if (Auth::guard('pembelian')->check()) {
            return \redirect()->route('supplier.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
