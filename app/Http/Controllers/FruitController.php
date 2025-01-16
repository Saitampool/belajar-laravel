<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruit;

class FruitController extends Controller
{
  /**
   * Autocomplete untuk mencari buah berdasarkan query.
   */
  public function autocomplete(Request $request)
  {
    $search = $request->get('query');

    // Validasi input query
    if (!$search) {
      return response()->json([]);
    }

    // Cari buah berdasarkan nama
    $fruits = Fruit::where('name', 'LIKE', '%' . $search . '%')->pluck('name');

    return response()->json($fruits);
  }

  /**
   * Ambil deskripsi buah berdasarkan nama.
   */
  public function getFruitDescription(Request $request)
  {
    $name = $request->get('name');

    // Validasi input name
    if (!$name) {
      return response()->json(['description' => 'Nama buah tidak valid.']);
    }

    // Cari buah berdasarkan nama
    $fruit = Fruit::where('name', $name)->first();

    if ($fruit) {
      return response()->json([
        'description' => $fruit->description
      ]);
    }

    return response()->json([
      'description' => 'Deskripsi tidak ditemukan.'
    ]);
  }
}
