<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MultimediaProject;
use App\Models\MultimediaPublication;
use Illuminate\Http\Request;

class MultimediaPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(MultimediaPublication::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'multimedia_link' => 'required|multimedia_link',
            'description'=>'required|description',
            'publication_id'=>'required|publication_id',
        ]);
        $multimediaPublication = MultimediaPublication::create($validateData);
        return response()->json($multimediaPublication, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $multimediaPublication = MultimediaPublication::find($id);
        if (!$multimediaPublication) {
            return response()->json(['message' => 'Multimedia Publication not found'], 404);
            }
        return response()->json($multimediaPublication, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $multimediaPublication = MultimediaPublication::find($id);
        if ($multimediaPublication) {
            $validateData = $request->validate([
                'multimedia_link' => 'multimedia_link',
                'description'=>'description',
                'publication_id'=>'publication_id',
            ]);
            $multimediaPublication->update($validateData);
            return response()->json($multimediaPublication, 200);
        }
        return response()->json(['message' => 'Multimedia Publication not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $multimediaPublication = MultimediaPublication::find($id);
        if ($multimediaPublication) {
            $multimediaPublication->delete();
            return response()->json(['message' => 'Multimedia Publication deleted'], 200);
        }
        return response()->json(['message' => 'Multimedia Publication not found'], 404);
    }
}
