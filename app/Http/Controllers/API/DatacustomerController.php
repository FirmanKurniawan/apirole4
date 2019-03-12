<?php

namespace App\Http\Controllers\Api;

use App\Datacustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DatacustomerCollection;
use App\Http\Resources\DatacustomerItem;

class DatacustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DatacustomerCollection(Datacustomer::get());
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
     * @param  \App\Datacustomer  $datacustomer
     * @return \Illuminate\Http\Response
     */
    public function show(Datacustomer $datacustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datacustomer  $datacustomer
     * @return \Illuminate\Http\Response
     */
    public function edit(Datacustomer $datacustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Datacustomer  $datacustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datacustomer $datacustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datacustomer  $datacustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datacustomer $datacustomer)
    {
        //
    }
}
