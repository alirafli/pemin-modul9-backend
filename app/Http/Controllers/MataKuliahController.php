<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;


class MataKuliahController extends Controller
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
  public function createMataKuliah(Request $request)
  {
    $mataKuliah = MataKuliah::create([
      'nama' => $request->nama,
    ]);

    return response()->json([
      'success' => true,
      'message' => 'New mata kuliah created',
      'data' => [
        'post' => $mataKuliah
      ]
    ]);
  }

  public function getAllMatkul(Request $request)
  {
    $matkul = MataKuliah::get();

    return response()->json([
      'matakuliah' => $matkul
    ]);
  }
  //
}
