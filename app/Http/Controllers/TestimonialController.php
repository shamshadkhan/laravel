<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonials.create');
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
            'description' => 'required|string',
            'image' => 'required',
            ]);
            $file=$request->file('image');
            $file->move(base_path('\nextjs_project\static\images'),$file->getClientOriginalName());
            $testimonial = new Testimonial([
                'description'=> $request->get('description'),
                'image'=> $file->getClientOriginalName()
            ]);
            $testimonial->save();
            return redirect('/testimonials')->with('success', config('constants.message.testimonial.add'));
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
            $testimonial = Testimonial::find($id);
            return response()->json($testimonial, 200);       
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
            $testimonial = Testimonial::all()->take(4);
            return response()->json($testimonial, 200);       
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
        $testimonial = Testimonial::find($id);
        return view('testimonials.edit', compact('testimonial'));
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
                'description' => 'required|string',
            ]);

            $testimonial = Testimonial::find($id);
            $testimonial->description = $request->get('description');
            $testimonial->save();

            return redirect('/testimonials')->with('success', config('constants.message.testimonial.edit'));
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
            $testimonial = Testimonial::find($id);
            $testimonial->delete();

            return redirect('/testimonials')->with('success', config('constants.message.testimonial.delete'));
        }
        catch(\Exception $e){
            report($e);
            return false;
        }
    }
}
