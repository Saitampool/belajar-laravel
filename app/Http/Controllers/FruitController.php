<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FruitController extends Controller
{
  public function autocomplete(Request $request)
  {
    $search = $request->get('query');
    $fruits = ['Apel', 'Pisang', 'Ceri', 'Kurma', 'Rambutan', 'Alpukat', 'Anggur', 'Melon', 'Mangga', 'Nanas', 'Semangka'];

    // Filter buah berdasarkan input
    $filteredFruits = array_filter($fruits, function ($fruit) use ($search) {
      return stripos($fruit, $search) !== false;
    });

    return response()->json(array_values($filteredFruits));
  }
}
