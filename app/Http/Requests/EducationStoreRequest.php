<?php

namespace App\Http\Requests;

use App\Models\Education;
use Illuminate\Foundation\Http\FormRequest;

class EducationStoreRequest extends FormRequest
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
        $tableName = (new Education)->getTable();

        return [
            'title' => 'required|unique:'.$tableName.'|max:255',
        ];
    }
}
