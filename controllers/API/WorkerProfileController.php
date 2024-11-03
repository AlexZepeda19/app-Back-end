<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class WorkerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $profiles = Profile::whereHas('user.role', function($query) {
            $query->where('name', 'Trabajador');
        })
        ->where('status', true)
        ->with([
            'professions',       
            'projects',          
            'contact',           
            'skills',            
            'workExperiences'    
        ])
        ->get();
        return response()->json($profiles, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
