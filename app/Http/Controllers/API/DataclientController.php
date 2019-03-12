<?php

namespace App\Http\Controllers\Api;

use App\Dataclient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataclientCollection;
use App\Http\Resources\DataclientItem;

class DataclientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DataclientCollection(Dataclient::get());
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
     * @param  \App\Dataclient  $dataclient
     * @return \Illuminate\Http\Response
     */
    public function show(Dataclient $dataclient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dataclient  $dataclient
     * @return \Illuminate\Http\Response
     */
    public function edit(Dataclient $dataclient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dataclient  $dataclient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dataclient $dataclient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dataclient  $dataclient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dataclient $dataclient)
    {
        //
    }
}
