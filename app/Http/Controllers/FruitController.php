<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruit;

class FruitController extends Controller
{
  /**
   * Autocomplete untuk mencari buah berdasarkan query.
   */
  public function autocomplete(Request $request) // Metode untuk menangani permintaan autocomplete.
  {
    $search = $request->get('query'); // Mengambil parameter 'query' dari permintaan.

    // Validasi input query.
    if (!$search) { // Jika query kosong atau tidak diberikan.
      return response()->json([]); // Kembalikan respons JSON kosong.
    }

    // Cari buah berdasarkan nama.
    $fruits = Fruit::where('name', 'LIKE', '%' . $search . '%')->pluck('name');
    // Melakukan pencarian pada tabel 'fruits' dengan nama yang mengandung teks pada query.
    // Hanya ambil kolom 'name' menggunakan pluck.

    return response()->json($fruits); // Kembalikan hasil pencarian sebagai respons JSON.
  }

  /**
   * Ambil deskripsi buah berdasarkan nama.
   */
  public function getFruitDescription(Request $request) // Metode untuk mengambil deskripsi buah berdasarkan nama.
  {
    $name = $request->get('name'); // Mengambil parameter 'name' dari permintaan.

    // Validasi input name.
    if (!$name) { // Jika nama tidak diberikan atau kosong.
      return response()->json(['description' => 'Nama buah tidak valid.']);
      // Kembalikan respons JSON dengan pesan error.
    }

    // Cari buah berdasarkan nama.
    $fruit = Fruit::where('name', $name)->first();
    // Cari buah di tabel 'fruits' berdasarkan nama. Ambil baris pertama yang cocok.

    if ($fruit) { // Jika buah ditemukan.
      return response()->json([
        'description' => $fruit->description // Kembalikan deskripsi buah dalam format JSON.
      ]);
    }

    // Jika buah tidak ditemukan.
    return response()->json([
      'description' => 'Deskripsi tidak ditemukan.' // Kembalikan pesan error jika deskripsi tidak ada.
    ]);
  }
}
