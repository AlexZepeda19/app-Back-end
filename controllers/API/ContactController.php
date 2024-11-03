<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Contact::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'phone'=> 'required|phone',
            'address' => 'required|address',
            'city' => 'required|city',
            'profile_id' => 'required|exists:profile,id'

        ]);

        $contact = Contact::create($validatedData);
        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            return response()->json($contact, 200);
        }
        return response()->json(['message' => 'Contact not found'], 404);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $validatedData = $request->validate([
                'email' => 'sometimes|string',
                'phone'=> 'sometimes|string',
                'address' => 'sometimes|string',
                'city' => 'sometimes|string',
                'profile_id' => 'sometimes|exists:profile_id'
                ]);
            $contact->update($validatedData);
            return response()->json($contact, 200);
        }
        return response()->json(['message' => 'Contact not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return response()->json(['message' => 'Contact deleted successfully'], 200);
        }
        return response()->json(['message' => 'Contact not found'], 404);
    }
}
