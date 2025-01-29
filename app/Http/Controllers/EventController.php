<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    public function index()
    {
        $events = DB::select('Select * from events');
        return response()->json([
            $events
        ]);
    }
    public function store(Request $request)
    {
        DB::insert("INSERT INTO events (title, Descriptions, date) VALUES (?, ?, ?)", [
            $request->title,
            $request->Descriptions,
            $request->date
        ]); 
        
        return response()->json(['Success'=>'Events Added!']);
    
    }

    public function show($id)
    {
        $event = DB::select("SELECT * FROM events WHERE id = ?", [$id]);
        return response()->json($event);
    }

    public function update(Request $request, $id)
    {
        DB::update("UPDATE events SET title = ?, Descriptions = ?, date = ? WHERE id = ?", [
            $request->title,
            $request->Descriptions,
            $request->date,
            $id
        ]);

        return response()->json(['message' => 'Event updated successfully']);
    }

    public function destroy($id)
    {
        DB::delete("DELETE FROM events WHERE id = ?", [$id]);
        return response()->json(['message' => 'Event deleted successfully']);
    }

}
