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

        return DB::table($table)
            ->where($column, 'LIKE', "%{$text}%")
            ->limit(15)
            ->pluck($column);
    }
}
