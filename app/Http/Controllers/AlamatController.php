<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Alamat;
use Laravolt\Indonesia\Facade as Indonesia;

class AlamatController extends Controller
{

    public function ubahAlamat(Request $request)
    {
        // dd($request->all());
        // validate request
        $validator = Validator::make($request->all(), [
            'alamat_lengkap' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kode_post' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'success' => false
            ], 422);
        }


        $data = [
            'alamat_lengkap' => $request->alamat_lengkap,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_post,
            'user_id' => Auth::user()->id
        ];
        $alamat = Alamat::where('user_id', Auth::user()->id)->first();
        if ($alamat) {
            if ($alamat->update($data)) {
                return response()->json([
                    'message' => 'Alamat berhasil diubah',
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'message' => 'Gagal mengubah alamat',
                    'success' => false
                ], 500);
            }
        } else {
            if (Alamat::create($data)) {
                return response()->json([
                    'message' => 'Alamat berhasil diubah',
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'message' => 'Gagal mengubah alamat',
                    'success' => false
                ], 500);
            }
        }
    }
}
