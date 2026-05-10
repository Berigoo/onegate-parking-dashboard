<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActiveEntryResource;
use App\Models\AccessLog;
use Illuminate\Http\Request;
use App\Models\ActiveEntry;
use App\Models\UserCards;

class ActiveEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = ActiveEntry::with('userCard')->get();
        return ActiveEntryResource::collection($entries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $card = UserCards::where('uid', $request->uid)
            ->first();

        if (!$card) {
            return response()->json([
                'success' => false,
            ], 404);
        }
        
        if (!$card->activeEntry) {
            $entry = new ActiveEntry();
            $entry->userCard()->associate($card);
            $entry->save();

            AccessLog::create([
                'user_card_id' => $card->id,
                'entered_at' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uid)
    {
        $entry = ActiveEntry::whereHas('userCard', function ($q) use ($uid){
            $q->where('uid', $uid);
        })->first();

        if (!$entry) {
            return response()->json([
                'success' => false,
            ], 404);
        }

        return new ActiveEntryResource($entry);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uid)
    {
        $entry = ActiveEntry::whereHas('userCard', function ($q) use ($uid){
            $q->where('uid', $uid);
        })->first();

        if (!$entry) {
            return response()->json([
                'success' => false,
            ], 404);
        }

        return response()->json([
            'success' => true
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uid)
    {
        $entry = ActiveEntry::whereHas('userCard', function ($q) use ($uid){
            $q->where('uid', $uid);
        })->first();

        if (!$entry) {
            return response()->json([
                'success' => false,
            ]);
        }

        AccessLog::where('user_card_id', $entry->userCard->id)
            ->whereNull('exited_at')
            ->latest()
            ->first()
            ?->update([
                'exited_at' => now(),
            ]);
        
        $entry->delete();

        return response()->json([
            'success' => true
        ], 200);
    }
}
