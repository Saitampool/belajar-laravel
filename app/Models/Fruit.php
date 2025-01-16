<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
  use HasFactory;

  /**
   * Nama tabel terkait model ini.
   */
  protected $table = 'fruits';

  /**
   * Kolom yang dapat diisi secara massal.
   */
  protected $fillable = [
    'name',
    'description',
  ];
}
