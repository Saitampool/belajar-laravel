<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FruitSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run()
  {
    DB::table('fruits')->insert([
      ['nama' => 'Apel', 'deskripsi' => 'Buah yang manis dan renyah.'],
      ['nama' => 'Pisang', 'deskripsi' => 'Buah kuning yang lembut dan bergizi.'],
      ['nama' => 'Ceri', 'deskripsi' => 'Buah kecil berwarna merah, manis, dan asam.'],
      ['nama' => 'Kurma', 'deskripsi' => 'Buah khas Timur Tengah, sangat manis.'],
      ['nama' => 'Rambutan', 'deskripsi' => 'Buah dengan kulit berbulu, manis dan segar.'],
      ['nama' => 'Alpukat', 'deskripsi' => 'Buah hijau dengan daging lembut, kaya nutrisi.'],
      ['nama' => 'Anggur', 'deskripsi' => 'Buah kecil berwarna ungu atau hijau, manis.'],
      ['nama' => 'Melon', 'deskripsi' => 'Buah hijau dengan rasa manis dan segar.'],
      ['nama' => 'Mangga', 'deskripsi' => 'Buah tropis yang manis dan berdaging.'],
      ['nama' => 'Nanas', 'deskripsi' => 'Buah dengan rasa manis dan asam, sangat segar.'],
    ]);
  }
}
