<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function show($id)
{
    $feature = Feature::find($id); // Contoh jika Anda menggunakan Eloquent Model

    if (!$feature) {
        return redirect()->route('features.index')->with('error', 'Feature not found');
    }
    return view('show', compact('feature'));
}
}
