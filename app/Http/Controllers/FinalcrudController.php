<?php

namespace App\Http\Controllers;

use App\finalcrud;
use Illuminate\Http\Request;

class FinalcrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *`
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data =  finalcrud::paginate(5);
        return view('home',compact('data'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $finalcrud = new finalcrud;
         $finalcrud->firstname= $request->firstname;
         $finalcrud->lastname=$request->lastname;
         $finalcrud->email=$request->email;
         $finalcrud->comment=$request->comment;
         $finalcrud->save();
         return redirect(route("home"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\finalcrud  $finalcrud
     * @return \Illuminate\Http\Response
     */
    public function show(finalcrud $finalcrud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\finalcrud  $finalcrud
     * @return \Illuminate\Http\Response
     */
    public function edit(finalcrud $finalcrud,$id  )
    {
        $all = finalcrud ::find($id);
       
        return view('edit',compact('all'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\finalcrud  $finalcrud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, finalcrud $finalcrud,$id)
    {
       
        $finalcrud= finalcrud::find($id);
        $finalcrud->firstname=$request->firstname;
        $finalcrud->lastname=$request->lastname;
        $finalcrud->email=$request->email;
        $finalcrud->comment=$request->comment;
        

        $finalcrud->save();

        return redirect(route("home"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\finalcrud  $finalcrud
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        finalcrud::find($id)->delete();
         return redirect(route("home"));
    }
}
