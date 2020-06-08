<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
            'venue'=>'required',
            'description' => 'required|string',
            'image' => 'required',
            ]);
            $file=$request->file('image');
            $file->move(base_path('\nextjs_project\static\images'),$file->getClientOriginalName());
            $event = new Event([
                'venue' => $request->get('venue'),
                'description'=> $request->get('description'),
                'image'=> $file->getClientOriginalName()
            ]);
            $event->save();
            return redirect('/events')->with('success', config('constants.message.event.add'));
        }
        catch(\Exception $e){
            report($e);
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $event = Event::find($id);
            return response()->json($event, 200);       
        } 
        catch (Exception $e) {
            report($e);
            return false;
        }
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        try {
            $event = Event::all()->take(4);
            $event_chunk=array_chunk(json_decode($event, true), 2);
            return response()->json($event_chunk, 200);       
        } 
        catch (Exception $e) {
            report($e);
            return false;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'venue'=>'required',
                'description' => 'required|string',
            ]);

            $event = Event::find($id);
            $event->venue = $request->get('venue');
            $event->description = $request->get('description');
            $event->save();

            return redirect('/events')->with('success', config('constants.message.event.edit'));
        }
        catch(\Exception $e){
            report($e);
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $event = Event::find($id);
            $event->delete();

            return redirect('/events')->with('success', config('constants.message.event.delete'));
        }
        catch(\Exception $e){
            report($e);
            return false;
        }
    }
}
