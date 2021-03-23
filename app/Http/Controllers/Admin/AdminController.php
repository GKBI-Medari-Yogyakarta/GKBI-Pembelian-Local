<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //to index admin
    public function index()
    {
        return \view('admin.index');
    }
}
