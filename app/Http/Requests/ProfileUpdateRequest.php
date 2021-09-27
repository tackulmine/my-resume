<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
        $tableName = (new User)->getTable();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:'.$tableName.',email,'.auth()->id().',id|max:100',
        ];

        if (!empty($this->password) || !empty($this->password_confirmation)) {
            $rules = [
                'password' => 'required|alpha_num|between:8,20|confirmed',
            ] + $rules;
        }

        if (!empty($this->photo)) {
            $rules = [
                'photo' => 'image|max:2048|mimes:jpg,jpeg,png|dimensions:ratio=1/1',
            ] + $rules;
        }

        return $rules;
    }
}
