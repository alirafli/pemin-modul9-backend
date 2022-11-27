<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MahasiswaController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  public function addMataKuliah(Request $request)
  {
    $mahasiswa = $request->mahasiswa;
    $mahasiswa->matakuliah()->attach($request->mkId);

    return response()->json([
      'success' => true,
      'message' => 'New matkul added!',
      'data' => [
        'comment' => $mahasiswa
      ]
    ]);
  }
  //

  public function getAllMahasiswa()
  {
    $mahasiswa = Mahasiswa::get();
    return response()->json([
      'status' => 'Success',
      'message' => 'all users grabbed',
      'data' => [
        'users' => $mahasiswa,
      ]
    ], 200);
  }

  public function getMahasiswaByNim(Request $request)
  {
    $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

    return response()->json([
      'status' => 'Success',
      'message' => 'get one user',
      'data' => $mahasiswa,
    ], 200);
  }
}
