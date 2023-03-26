<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\AcessLogMiddleware;

class AboutController extends Controller
{
    //como usar um middleware no controller
    /*public function __construct(){
        $this->middleware(AcessLogMiddleware::class);
    }*/


    public function about() {
        return view('site.about');
    }
}
