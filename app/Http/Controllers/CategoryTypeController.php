<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryTypeController extends Controller
{
    public function create()
    {
        return view('category_types'); // Blade che monta Vue
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:50'],
        ]);

        DB::table('category_types')->insert([
            'name'       => $data['name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Risposta JSON per Axios
        return response()->json(['ok' => true], 201);
    }
}
