<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Profession::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        $profession = Profession::create($validateData);
        return response()->json($profession, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profession = Profession::find($id);
        if (!$profession) {
            return response()->json(['message' => 'Profession not found'], 404);
        }
        return response()->json($profession, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profession = Profession::find($id);
        if ($profession) {
            $validateData = $request->validate([
                'name' => 'string',
                'description' => 'string',
        ]);
        $profession->update($validateData);
        return response()->json($profession, 200);
        } else {
            return response()->json(['message' => 'Profession not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profession = Profession::find($id);
        if ($profession) {
            $profession->delete();
            return response()->json(['message' => 'Profession deleted'], 200);
        } 
        return response()->json(['message' => 'Profession not found'], 404);  
    }
}
