<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use Carbon\Carbon;

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
    public function index()
    {   
        $parent = Guest::where('guest_type','parent')->count();
        $alumni = Guest::where('guest_type','alumni')->count();
        $other = Guest::where('guest_type','other')->count();
        $today = Guest::whereDate('created_at', Carbon::today())->count();
        return view('home',compact('parent','alumni','other','today'));
    }
}
