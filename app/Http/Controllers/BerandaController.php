<?php

namespace App\Http\Controllers;

use Flasher\Notyf\Prime\NotyfInterface;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('dokter/beranda');
    }

    public function store(Request $request)
    {
        // dd($request->input());

        // notyf()->success('Your form has been submitted.');
        return view('dokter/beranda');
    }
}
