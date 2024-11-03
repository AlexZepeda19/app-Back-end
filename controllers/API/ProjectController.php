<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Project::all());
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'description'=>'required|string',
            'profile_id'=> 'required|profile_id'
        ]);
        $project = Project::create($validateData);
        return response()->json($project, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        if ($project) {
            return response()->json($project,200);
        }
        return response()->json(['message' => 'Project not found'], 404);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        if ($project) {
            $validateData = $request->validate([
                'name' => 'string',
                'description'=>'string',
                'profile_id'=> 'profile_id'
            ]);
            $project->update($validateData);
            return response()->json($project, 200);
        }
        return response()->json(['message' => 'Project not found'], 404);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->delete();
            return response()->json(['message' => 'Project deleted successfully'], 200);
        }
        return response()->json(['message' => 'Project not found'], 404);
    }
}
