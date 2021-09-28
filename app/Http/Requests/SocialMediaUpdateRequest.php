<?php

namespace App\Http\Requests;

use App\Models\SocialMedia;
use Illuminate\Foundation\Http\FormRequest;

class SocialMediaUpdateRequest extends FormRequest
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
        $tableName = (new SocialMedia)->getTable();

        return [
            'title' => 'required|unique:'.$tableName.',title,'.request()->segment(3).',id|max:255',
        ];
    }
}
