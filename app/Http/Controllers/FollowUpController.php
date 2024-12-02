<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FollowUp;

class FollowUpController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'lead_id' => 'required|exists:leads,id',
        'scheduled_at' => 'required|date|after:now',
    ]);

    $followUp = FollowUp::create($validated + ['status' => 'Pending']);
    return response()->json(['followUp' => $followUp], 201);
}

public function updateStatus(Request $request, FollowUp $followUp)
{
    $this->authorize('updateStatus', $followUp);

    $validated = $request->validate([
        'status' => 'required|in:Pending,Completed,Missed',
    ]);

    $followUp->update(['status' => $validated['status']]);

    if ($followUp->status === 'Missed') {
        FollowUpStatusChanged::dispatch($followUp);
    }

    return response()->json(['followUp' => $followUp], 200);
}
}
