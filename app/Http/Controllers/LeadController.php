<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::orderBy("created_at", "desc")->paginate(10);
        return response()->json(['leads' => $leads], 200);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email',
            'phone' => 'required|string|max:15',
        ]);

        $lead = Lead::create($validated);
        return response()->json(['lead' => $lead], 200);
    }
    public function update(Request $request, Lead $lead){
        // $this->authorize('update', $lead);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email,'.$lead->id,
            'phone' => 'required|string|max:15',
        ]);

        $lead->update($validated);
        return response()->json(['lead' => $lead], 200);
    }
}
