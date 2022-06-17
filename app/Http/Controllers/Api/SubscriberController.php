<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Http\Resources\SubscriberResource;
use App\Models\Field;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return SubscriberResource::collection(Subscriber::with('state')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubscriberRequest $request
     * @return SubscriberResource
     */
    public function store(SubscriberRequest $request)
    {
        $subscriber = Subscriber::create($request->validated());

        return new SubscriberResource($subscriber);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subscriber $subscriber
     * @return SubscriberResource
     */
    public function show(Subscriber $subscriber)
    {
        return new SubscriberResource($subscriber->load('fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subscriber $subscriber
     * @return SubscriberResource
     */
    public function update(SubscriberRequest $request, Subscriber $subscriber)
    {
        $subscriber->update($request->validated());

        $this->synchronisingFields($request->fields, $subscriber);

        return new SubscriberResource($subscriber);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return response()->noContent();
    }

    private function synchronisingFields(array $requestFields, Subscriber $subscriber)
    {
        //deleting entities if they were deleted on front
        foreach ($subscriber->fields as $field) {
            $exist = false;
            foreach ($requestFields as $newField) {
                if ($field->id == $newField['id']) {
                    $exist = true;
                }
            }
            if (!$exist) {
                $field->delete();
            }
        }

        foreach ($requestFields as $field) {
            //updating entities if they were deleted on front
            if ($field['id']) {
                Field::find($field['id'])->update([
                    'title' => $field['title'],
                    'field_type_id' => $field['field_type_id']
                ]);
            } else {
                //creating entities if they were created on front
                Field::insert([
                    'title' => $field['title'],
                    'field_type_id' => $field['field_type_id'],
                    'subscriber_id' => $subscriber->id
                ]);
            }
        }
    }
}
