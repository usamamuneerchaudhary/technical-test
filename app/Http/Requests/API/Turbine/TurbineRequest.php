<?php

namespace App\Http\Requests\API\Turbine;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TurbineRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'type' => [
                        'required',
                        Rule::in(['stream', 'gas', 'contra', 'transonic', 'ceramic']),
                    ],
                    'grade' => [
                        'required',
                        'numeric',
                        Rule::in([1, 2, 3, 4, 5]),
                    ],
                    'latitude' => 'required|numeric',
                    'longitude' => 'required|numeric',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [

                ];
            }
            default:
                break;
        }
    }

    public function messages()
    {
        return [

        ];
    }


}
