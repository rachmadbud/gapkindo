<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'complaints' => 'required|array',
        ]);

        foreach ($validated['complaints'] as $item) {

            Complaint::create([
                'email' => $validated['email'],
                'permasalahan' => $item['permasalahan'],
                'harapan' => $item['harapan'] ?? null,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    // public function store(Request $request)
    // {
    //     foreach ($request->complaints as $item) {

    //         DB::table('complaints')->insert([
    //             'email' => $request->email,
    //             'permasalahan' => $item['permasalahan'],
    //             'harapan' => $item['harapan'],
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data berhasil disimpan'
    //     ]);
    // }
}
