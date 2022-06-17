<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberStateResource;
use App\Models\SubscriberState;
use Illuminate\Http\Request;

class SubscriberStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubscriberStateResource::collection(SubscriberState::all());
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
     * @param  \App\Models\SubscriberState  $subscriberState
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriberState $subscriberState)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubscriberState  $subscriberState
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscriberState $subscriberState)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriberState  $subscriberState
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriberState $subscriberState)
    {
        //
    }
}
