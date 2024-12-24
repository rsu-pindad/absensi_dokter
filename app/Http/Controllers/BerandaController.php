<?php

namespace App\Http\Controllers;

use App\Models\AbsensiDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class BerandaController extends Controller
{
    public function index()
    {
        $dataAbsen = AbsensiDokter::where('user_id', Auth::id())->whereDate('created_at', Carbon::today())->get();

        return view('beranda/index')->with([
            'isAbsen'   => count($dataAbsen),
            'lastPhoto' => $dataAbsen->first()->user_photo ?? null,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitudeInput'  => 'required|string',
            'longitudeInput' => 'required|string',
            'radiusInput'    => 'required|string',
            'pictureInput'   => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'validasi' => $validator->errors()->all()]);
        }

        $validated = $validator->validated();
        // dd($validated['latitudeInput']);

        // $safeLatitude  = request()->input('latitudeInput');
        // $safeLongitude = request()->input('longitudeInput');
        // $safeRadius    = request()->input('radiusInput');
        // $safePicture   = request()->input('pictureInput');

        $safeLatitude  = $validated['latitudeInput'];
        $safeLongitude = $validated['longitudeInput'];
        $safeRadius    = $validated['radiusInput'];
        $safePicture   = $validated['pictureInput'];

        $img        = Image::read(file_get_contents($safePicture));
        $randomName = Str::random();
        $path       = Storage::disk('public')->path('absensi/') . $randomName . '.png';
        $img->toPng()->save($path);
        $absensiDokter = AbsensiDokter::create([
            'user_id'        => Auth::id(),
            'user_latitude'  => $safeLatitude,
            'user_longitude' => $safeLongitude,
            'user_radius'    => $safeRadius,
            'user_photo'     => $randomName,
        ]);

        if ($absensiDokter) {
            return response()->json(['status' => 201, 'validasi' => null]);
        }

        return response()->json(['status' => 500]);
        // return to_route('beranda');
    }
}
