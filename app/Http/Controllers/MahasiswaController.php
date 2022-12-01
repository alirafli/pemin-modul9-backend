<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\MataKuliah;
use PhpParser\Node\Expr\AssignOp\Concat;

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

  public function addMataKuliahWithToken(Request $request)
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

  public function addMataKuliah(Request $request)
  {
    $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();
    $mahasiswa->matakuliah()->attach($request->mkId);

    return response()->json([
      'success' => true,
      'message' => 'New matkul added!',
      'data' => [
        'comment' => $mahasiswa
      ]
    ]);
  }

  public function deleteMahasiswaMatkul(Request $request)
  {
    $mahasiswa = Mahasiswa::with('matakuliah')->find($request->nim);
    $mahasiswa->matakuliah()->detach($request->mkId);

    return response()->json([
      'success' => true,
      'message' => 'deleted!',
      'mhs_id' => $mahasiswa,

    ]);
  }
  //



  public function getAllMahasiswa()
  {
    $mahasiswa = Mahasiswa::get();
    return response()->json([
      'status' => 'Success',
      'message' => 'all users grabbed',
      'mahasiswa' => $mahasiswa
    ], 200);
  }

  public function getMahasiswaByNim(Request $request)
  {
    $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

    return response()->json([
      'status' => 'Success',
      'message' => 'get one user',
      'mahasiswa' => $mahasiswa,
      'matakuliah' => $mahasiswa->matakuliah,
    ], 200);
  }
}
