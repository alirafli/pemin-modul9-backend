<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
  }

  public function register(Request $request)
  {
    $nama = $request->nama;
    $nim = $request->nim;
    $angkatan = $request->angkatan;
    $password = Hash::make($request->password);

    $mahasiswa = Mahasiswa::create([
      'nama' => $nama,
      'nim' => $nim,
      'angkatan' => $angkatan,
      'password' => $password
    ]);

    return response()->json([
      'status' => 'Success',
      'message' => 'new mahasiswa created',
      'data' => [
        'user' => $mahasiswa,
      ]
    ], 200);
  }

  public function login(Request $request)
  {
    $nim = $request->nim;
    $password = $request->password;

    $mahasiswa = Mahasiswa::where('nim', $nim)->first();

    if (!$mahasiswa) {
      return response()->json([
        'status' => 'Error',
        'message' => 'user not exist',
      ], 404);
    }

    if (!Hash::check($password, $mahasiswa->password)) {
      return response()->json([
        'status' => 'Error',
        'message' => 'wrong password',
      ], 400);
    }

    return response()->json([
      'status' => 'Success',
      'message' => 'successfully login',
      'data' => [
        'user' => $mahasiswa,
      ]
    ], 200);
  }

  // public function me(Request $request)
  // {
  //   $user = $request->user;

  //   return response()->json([
  //     'status' => 'Success',
  //     'message' => $user,
  //   ], 200);
  // }
}
