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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('dashboard.dashboard');
    }

    public function changeLoginPfu(Request $request)
    {
        $request->session()->put('pfu', $request->pfu);

        return response()->json(['success' => true, 'message' => 'User Pfu Changed']);
    }
}
