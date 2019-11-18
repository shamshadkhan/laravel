<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.create');
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
            'sub_title'=> 'required|string',
            'description' => 'required|string',
            'image' => 'required',
            ]);
            $file=$request->file('image');
            $file->move(base_path('\nextjs_project\static\images'),$file->getClientOriginalName());
            $slider = new Slider([
                'title' => $request->get('title'),
                'sub_title'=> $request->get('sub_title'),
                'description'=> $request->get('description'),
                'image'=> $file->getClientOriginalName()
            ]);
            $slider->save();
            return redirect('/sliders')->with('success', config('constants.message.slider.add'));
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
            $slider = Slider::find($id);
            return response()->json($slider, 200);       
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
            $slider = Slider::all();
            return response()->json($slider, 200);       
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
        $slider = Slider::find($id);
        return view('sliders.edit', compact('slider'));
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
                'sub_title'=> 'required|string',
                'description' => 'required|string',
            ]);

            $slider = Slider::find($id);
            $slider->title = $request->get('title');
            $slider->sub_title = $request->get('sub_title');
            $slider->description = $request->get('description');
            $slider->save();

            return redirect('/sliders')->with('success', config('constants.message.slider.edit'));
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
            $slider = Slider::find($id);
            $slider->delete();

            return redirect('/sliders')->with('success', config('constants.message.slider.delete'));
        }
        catch(\Exception $e){
            report($e);
            return false;
        }
    }
}
