<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kid;
use App\Models\Mum;
use App\Models\InjectVaccine;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        if ($keyword) {
            $injectvaccines = InjectVaccine::where(function ($query) use ($keyword) {
                $query->where("Kid_id", "LIKE", '%'.$keyword.'%');
            })->orderBy('no', 'DESC')->paginate(15);
        }
        else {
            $injectvaccines = InjectVaccine::orderBy('no', 'DESC')->paginate(15);
        }
        return view('welcome', [
            'injectvaccines' => $injectvaccines,
        ]);
    }
}
