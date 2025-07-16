<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return view('home');
        $content = 'admin/dashboard/index'; 
        return view('admin/master')->with(['content'=>$content]);
    }
}
