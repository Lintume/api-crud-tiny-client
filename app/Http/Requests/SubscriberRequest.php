<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subscriber_state_id' => 'required|integer|exists:subscriber_states,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'fields.*.id' => 'nullable|int|exists:fields,id',
            'fields.*.title' => 'required|string|max:255',
            'fields.*.field_type_id' => 'required|int|exists:field_types,id'
        ];
    }
}
