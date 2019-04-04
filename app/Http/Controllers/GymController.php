<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddGyms;
use Illuminate\Support\Facades\Auth;
class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
            
        
            $gyms = AddGyms::all();
            
            return view('home')->with('gyms',$gyms);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $gyms= new AddGyms;

        $gyms->gymname=$request->gymname;
        $gyms->location=$request->location;
        $gyms->details=$request->details;
        $gyms->userid=Auth::id();
        $gyms->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gyms = AddGyms::find($id);
       
        return view('edit')->with('gyms',$gyms);

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
        // dd($request);
        $gyms = AddGyms::find($id);
        $gyms->gymname=$request->gymname;
        $gyms->location=$request->location;
        $gyms->details=$request->details;
        $gyms->save();
        return redirect()->action('GymController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $gyms = AddGyms::where('id',$id)->delete();
        
        return redirect()->back();
    }

    public function restoregym(){
        $restore=AddGyms::withTrashed()
        ->where('userid', Auth::id())
        ->restore();
        return redirect()->back();
        
    }
}
