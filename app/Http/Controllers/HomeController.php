<?php

namespace App\Http\Controllers;

use App\Models\ContactReason;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {

        $motivo_contatos = ContactReason::all();

        return view('site.home', ['motivo_contatos' => $motivo_contatos]);
    }

    public function index()
    {
        return view('app.home');
    }
}
