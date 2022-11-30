<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatkulSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    $matakuliahs = [
      ['nama' => 'Pemrograman Dasar'],
      ['nama' => 'Pemrograman Lanjut'],
      ['nama' => 'Algoritma dan Struktur Data'],
      ['nama' => 'Sistem Basis Data'],
      ['nama' => 'Jaringan Komputer Dasar']
    ];
    MataKuliah::insert($matakuliahs);
  }
}
