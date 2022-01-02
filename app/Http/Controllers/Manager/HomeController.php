<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
}
