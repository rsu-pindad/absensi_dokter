<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaceRecognitionController extends Controller
{
    public function index()
    {
        return view('dokter.face');
    }
}
