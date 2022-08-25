<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            
            'room_number' => 'required',
            'cardId' => 'required',
            'guestCount' => 'required',
            'price' => 'required',
            'floor' => 'max:2147483647|required|numeric',
            'description' => 'required',
        ];
    }
}
