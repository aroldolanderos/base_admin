<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of publications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('manager.home');
    }
}
