<?php

namespace App\Http\Requests;

use App\Models\City;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class ContestCreateRequest extends FormRequest
{
    protected $redirectRoute = 'contest';
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
            'name'                  =>  'required|min:3|max:50',
            'last_name'             =>  'required|min:3|max:50',
            'department_id'         =>  'required|exists:departments,id',
            'city_id'               =>  [new RequiredIf(City::where('department_id', $this->department_id)->count() > 0 ), 'exists:cities,id,department_id,'.$this->department_id],
            'email'                 =>  'required|email',
            'phone'                 =>  'required|digits_between:7,10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'identification_number' =>  'required|digits_between:6,10',
            'habeas_data'           =>  'required|accepted'
        ];
    }
}
