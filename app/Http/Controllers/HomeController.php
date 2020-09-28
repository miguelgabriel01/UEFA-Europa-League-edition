<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Players;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $player = Players::orderBy('created_at', 'desc')->paginate(3);
        return view('home', compact('player'));    }
}
