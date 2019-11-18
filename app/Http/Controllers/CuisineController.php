<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuisine;
use DB;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuisines = DB::table('cuisines')->paginate(10);

        return view('cuisines.index', compact('cuisines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuisines.create');
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
            'price'=> 'required|integer',
            'discount_amount' => 'integer',
            'image' => 'required',
            ]);
            $file=$request->file('image');
            $file->move(base_path('\nextjs_project\static\images'),$file->getClientOriginalName());
            $cuisine = new Cuisine([
                'title' => $request->get('title'),
                'price'=> $request->get('price'),
                'discount' => $request->get('discount_amount') > config('constants.numbers.zero')? config('constants.numbers.one'): config('constants.numbers.zero'),
                'discount_amount'=> $request->get('discount_amount'),
                'image'=> $file->getClientOriginalName()
            ]);
            $cuisine->save();
            return redirect('/cuisines')->with('success', config('constants.message.cuisine.add'));
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
            $cuisine = Cuisine::find($id);
            return response()->json($cuisine, 200);       
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
            $cuisine = DB::table('cuisines')->paginate(6);
            return response()->json($cuisine, 200);       
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
        $cuisine = Cuisine::find($id);
        return view('cuisines.edit', compact('cuisine'));
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
                'price'=> 'required|integer',
                'discount_amount' => 'required|integer',
            ]);

            $cuisine = Cuisine::find($id);
            $cuisine->title = $request->get('title');
            $cuisine->price = $request->get('price');
            $cuisine->discount = $request->get('discount_amount') > config('constants.numbers.zero')? config('constants.numbers.one'): config('constants.numbers.zero');
            $cuisine->discount_amount = $request->get('discount_amount');
            $cuisine->save();

            return redirect('/cuisines')->with('success', config('constants.message.cuisine.edit'));
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
            $cuisine = Cuisine::find($id);
            $cuisine->delete();

            return redirect('/cuisines')->with('success', config('constants.message.cuisine.delete'));
        }
        catch(\Exception $e){
            report($e);
            return false;
        }
    }
}
