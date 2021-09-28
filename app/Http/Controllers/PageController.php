<?php

namespace App\Http\Controllers;
// use Auth;

use Illuminate\Http\Request;
use App\models\Propiedades as Propiedades;


class PageController extends Controller
{

    public function index()
    {
        $data = Propiedades::all();
        // dd($data);
        return view('home')->with(['data'=>$data]);
    }
}
