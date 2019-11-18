<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            'title'=>'required',
            'description' => 'required|string',
            'image' => 'required',
            ]);
            $file=$request->file('image');
            $file->move(base_path('\nextjs_project\static\images'),$file->getClientOriginalName());
            $service = new Service([
                'title' => $request->get('title'),
                'description'=> $request->get('description'),
                'image'=> $file->getClientOriginalName()
            ]);
            $service->save();
            return redirect('/services')->with('success',config('constants.message.service.add'));
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
            $service = Service::find($id);
            return response()->json($service, 200);       
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
            $service = Service::all()->take(3);
            return response()->json($service, 200);       
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
        $service = Service::find($id);
        return view('services.edit', compact('service'));
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
                'title'=>'required',
                'description' => 'required|string',
            ]);

            $service = Service::find($id);
            $service->title = $request->get('title');
            $service->description = $request->get('description');
            $service->save();

            return redirect('/services')->with('success', config('constants.message.service.edit'));
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
            $service = Service::find($id);
            $service->delete();

            return redirect('/services')->with('success', config('constants.message.service.delete'));
        }
        catch(\Exception $e){
            report($e);
            return false;
        }
    }
}
