<?php

namespace App\Http\Requests;

use App\Models\Interest;
use Illuminate\Foundation\Http\FormRequest;

class InterestUpdateRequest extends FormRequest
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
        $tableName = (new Interest)->getTable();

        return [
            'title' => 'required|unique:'.$tableName.',title,'.request()->segment(3).',id|max:255',
        ];
    }
}
