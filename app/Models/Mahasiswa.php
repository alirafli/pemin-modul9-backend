<?php

namespace App\Models;

namespace App\Models;

use App\Models\MataKuliah;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Mahasiswa extends Model implements AuthenticatableContract, AuthorizableContract
{
  use Authenticatable, Authorizable, HasFactory;
  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'nim', 'nama', 'angkatan', 'password', 'token'
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var string[]
   */
  protected $hidden = [
    'password',
  ];

  public function matakuliah()
  {
    return $this->belongsToMany(MataKuliah::class, 'mahasiswa_matakuliah', 'mkId', 'mhsNim');
  }
}
