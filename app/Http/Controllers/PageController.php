<?php

namespace App\Http\Controllers;
// use Auth;

use Illuminate\Http\Request;
use App\models\propiedades as propied;


class PageController extends Controller
{

    public function index()
    {
        $data = propied::all();
        // dd($data);
        return view('home')->with(['data'=>$data]);
    }
}
