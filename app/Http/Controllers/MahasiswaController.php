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
}