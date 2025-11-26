<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function autocomplete(Request $request)
    {
        $q = $request->query();
        $table = $q['table'] ?? '';
        $column = $q['column'] ?? '';
        $text = $q['text'] ?? '';

        // basic validation to avoid SQL injection via table/column names
        if (!preg_match('/^[A-Za-z0-9_]+$/', $table) || !preg_match('/^[A-Za-z0-9_]+$/', $column)) {
            return collect([]);
        }

        $results = DB::table($table)
            ->where($column, 'LIKE', "%{$text}%")
            ->limit(15)
            ->get(["$column as name", 'slug']);

        return $results;
        
        // // Memproses collection untuk mendapatkan dua array terpisah
        // $columnValues = $results->pluck($column)->values()->toArray();
        // $slugValues = $results->pluck('slug')->values()->toArray();

        // // Mengembalikan respons JSON dengan format yang diinginkan
        // return response()->json([
        //     'columns' => $columnValues,
        //     'slugs' => $slugValues,
        // ]);
    }
}
