<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FieldTypeResource;
use App\Models\FieldType;
use Illuminate\Http\Request;

class FieldTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return FieldTypeResource::collection(FieldType::all());
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
     * @param  \App\Models\FieldType  $fieldType
     * @return \Illuminate\Http\Response
     */
    public function show(FieldType $fieldType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FieldType  $fieldType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldType $fieldType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldType  $fieldType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldType $fieldType)
    {
        //
    }
}
