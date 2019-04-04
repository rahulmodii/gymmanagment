<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddGyms;
use App\People;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
         $diff=Carbon::now()->subDays(5)->toDateString();
         $current=Carbon::now()->toDateString();
        if($id == 'all'){
            $peoples=People::all();
        }
        elseif ($id == 'fee') {
            $peoples= People::whereBetween('joiningdate',array($diff,$current))->get();
        }

        else {
            $peoples=People::all();
        }
        

        $gyms= AddGyms::all();  
        return view('people')->with('gyms',$gyms)->with('peoples',$peoples);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $people = new People;
        $people->name = $request->peoplename;
        $people->address = $request->address;
        $people->gymid = $request->gymid;
        $date=$request->date;
        $people->joiningdate = Carbon::today()->addMonths($date);
        $filename=request()->file('image')->store('public');
        $url = Storage::url($filename);
        $people->image = $url;
        $people->save(); 

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function try(){

    }
    
}
