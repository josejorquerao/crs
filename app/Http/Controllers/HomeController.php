<?php

namespace App\Http\Controllers;

use App\Models\Cottage;
use Carbon\Carbon;
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
    public function index()
    {
        return view('index');
    }
    public function show()
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $cottages = Cottage::all();
        return view('index', compact('cottages','date'));
    }
}
