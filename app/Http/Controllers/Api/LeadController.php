<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    // List all leads
    public function index()
    {
        $leads = Lead::all();
        return response()->json($leads);
    }

    // Show a single lead
    public function show($id)
    {
        $lead = Lead::find($id);

        if (!$lead) {
            return response()->json(['message' => 'Lead not found'], 404);
        }

        return response()->json($lead);
    }

    // Create a new lead
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email',
            'phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ]);

        $lead = Lead::create($request->all());

        return response()->json($lead, 201);
    }

    // Update an existing lead
    public function update(Request $request, $id)
    {
        $lead = Lead::find($id);

        if (!$lead) {
            return response()->json(['message' => 'Lead not found'], 404);
        }

        $request->validate([
            'name'  => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:leads,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ]);

        $lead->update($request->all());

        return response()->json($lead);
    }

    // Delete a lead
    public function destroy($id)
    {
        $lead = Lead::find($id);

        if (!$lead) {
            return response()->json(['message' => 'Lead not found'], 404);
        }

        $lead->delete();

        return response()->json(['message' => 'Lead deleted successfully']);
    }
}
