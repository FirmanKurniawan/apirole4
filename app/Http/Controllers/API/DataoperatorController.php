<?php

namespace App\Http\Controllers\Api;

use App\Dataoperator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataoperatorCollection;
use App\Http\Resources\DataoperatorItem;

class DataoperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DataoperatorCollection(Dataoperator::get());
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
     * @param  \App\Dataoperator  $dataoperator
     * @return \Illuminate\Http\Response
     */
    public function show(Dataoperator $dataoperator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dataoperator  $dataoperator
     * @return \Illuminate\Http\Response
     */
    public function edit(Dataoperator $dataoperator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dataoperator  $dataoperator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dataoperator $dataoperator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dataoperator  $dataoperator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dataoperator $dataoperator)
    {
        //
    }
}
