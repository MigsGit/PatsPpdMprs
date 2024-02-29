<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EjectorRequest extends FormRequest
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
            'bwd_stop' => ['required','integer'],
            'count' => ['required','integer'],
            'ej_pres' => ['required','integer'],
            'fwd_ev1' => ['required','integer'],
            'fwd_ev2' => ['required','integer'],
            'fwd_stop' => ['required','integer'],
            'pattern' => ['required','integer'],
        ];
    }
}
