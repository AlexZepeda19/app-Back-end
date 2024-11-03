<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data' => Publication::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|int',
            'profile_id' => 'required|int|exists:profiles,id',
            'profession_id' => 'required|int|exists:professions,id'
        ]);

        $publication = Publication::create($validateData);
        return response()->json(['data' => $publication], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publication = Publication::find($id);
        
        if (!$publication) {
            return response()->json(['message' => 'Publication not found'], 404);
        }

        return response()->json(['data' => $publication], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publication = Publication::find($id);
        
        if (!$publication) {
            return response()->json(['message' => 'Publication not found'], 404);
        }

        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|int',
            'profile_id' => 'required|int|exists:profiles,id',
            'profession_id' => 'required|int|exists:professions,id'
        ]);

        $publication->update($validateData);
        return response()->json(['data' => $publication], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publication = Publication::find($id);

        if (!$publication) {
            return response()->json(['message' => 'Publication not found'], 404);
        }

        $publication->delete();
        return response()->json(['message' => 'Publication deleted', 'data' => $publication], 200);
    }
}
