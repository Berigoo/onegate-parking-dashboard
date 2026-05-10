<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActiveEntryResource;
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
            ->firstOrFail();
        $entry = new ActiveEntry();
        $entry->userCard()->associate($card);
        $entry->save();

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
        })->firstOrFail();

        return new ActiveEntryResource($entry);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uid)
    {
        $entry = ActiveEntry::whereHas('userCard', function ($q) use ($uid){
            $q->where('uid', $uid);
        })->firstOrFail();

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
        })->firstOrFail();
        $entry->delete();

        return response()->json([
            'success' => true
        ], 200);
    }
}
