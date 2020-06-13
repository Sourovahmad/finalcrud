<?php

namespace App\Http\Controllers;

use App\testmodal;
use Illuminate\Http\Request;

class TestmodalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("test");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\testmodal  $testmodal
     * @return \Illuminate\Http\Response
     */
    public function show(testmodal $testmodal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\testmodal  $testmodal
     * @return \Illuminate\Http\Response
     */
    public function edit(testmodal $testmodal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\testmodal  $testmodal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, testmodal $testmodal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\testmodal  $testmodal
     * @return \Illuminate\Http\Response
     */
    public function destroy(testmodal $testmodal)
    {
        //
    }
}
