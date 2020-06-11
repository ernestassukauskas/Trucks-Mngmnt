<?php

namespace App\Http\Requests;

use App\Rules\ManufactorYear;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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

        $rules = [

            'model' => 'required|max:32',
            'manufactor_year' => ['required', new ManufactorYear],
            'owner_name_surname' => 'required|max:64',
            'owners_amount' => 'max:12',
            'comments' => 'max:255',

        ];

        return $rules;
    }

    public function messages() {

        $message = [
            'model.required' => "* Markės laukelis privalomas",
            'manufactor_year.required' => "* Gamybos metų laukelis privalomas",
            'owner_name_surname.required' => "* Savininko vardo ir pavardės laukelis privalomas",
        ];

        return $message;
    }
}
