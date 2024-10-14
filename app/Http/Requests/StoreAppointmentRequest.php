<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'meeting_at' => 'required|date',
            'product_id' => 'required|exists:products,id',
            'budget' => 'required|numeric',
            'brief' => 'nullable|string',
        ];
    }
    
}
