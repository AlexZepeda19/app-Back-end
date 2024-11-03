<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MultimediaProject;
use Illuminate\Http\Request;

class MultimediaProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(MultimediaProject::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id'=> 'required|project_id',
            'multimedia_link'=>'required|multimedia_link'
        ]);

        $multimediaProject = Contact::create($validatedData);
        return response()->json($multimediaProject, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $multimediaProject = MultimediaProject::find($id);
        if($multimediaProject){
            return response()->json($multimediaProject, 200);
        }
        return response()->json(['message' => 'Multimedia Project not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $multimediaProject = MultimediaProject::find($id);
        if($multimediaProject){
            $validatedData = $request->validate([
                'project_id'=> 'required|project_id',
                'multimedia_link'=>'required|multimedia_link'
                ]);
            $multimediaProject->update($validatedData);
            return response()->json($multimediaProject, 200);
        }
        return response()->json(['message' => 'Multimedia Project not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $multimediaProject = MultimediaProject::find($id);
        if($multimediaProject){
            $multimediaProject->delete();
            return response()->json(['message' => 'Multimedia Project deleted'], 200);
        }
        return response()->json(['message' => 'Multimedia Project not found'], 404);
    }
}
