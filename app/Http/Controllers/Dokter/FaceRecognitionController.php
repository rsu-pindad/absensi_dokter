<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaceRecognitionController extends Controller
{
    public function faceLocation()
    {
        return view('beranda.face-location');
    }
    public function face()
    {
        return view('beranda.face');
    }

    public function location()
    {
        return view('beranda.location');
    }
}
