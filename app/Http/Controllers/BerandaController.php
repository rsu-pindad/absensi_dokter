<?php

namespace App\Http\Controllers;

use App\Models\AbsensiDokter;
use Flasher\Notyf\Prime\NotyfInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class BerandaController extends Controller
{
    public function index()
    {
        $absen = AbsensiDokter::where('user_id', Auth::id())->whereDate('created_at', Carbon::today())->get();
        // dd(count($absen));

        return view('beranda/index')->with([
            'isAbsen' => count($absen),
            // 'isAbsen' => 1,
        ]);
    }

    public function store(Request $request)
    {
        $safeLatitude  = request()->input('latitudeInput');
        $safeLongitude = request()->input('longitudeInput');
        $safeRadius    = request()->input('radiusInput');

        $absensiDokter = AbsensiDokter::create([
            'user_id'        => Auth::id(),
            'user_latitude'  => $safeLatitude,
            'user_longitude' => $safeLongitude,
            'user_radius'    => $safeRadius,
        ]);

        if ($absensiDokter) {
            return response()->json(['status' => 201]);
        }
        return response()->json(['status' => 500]);
        // return to_route('beranda');
    }
}
