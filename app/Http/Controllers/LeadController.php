<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
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
}
