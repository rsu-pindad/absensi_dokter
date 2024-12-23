<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaceRecognitionController extends Controller
{
    public function face()
    {
        return view('beranda.face');
    }
}
