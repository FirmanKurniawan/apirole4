<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Colleague extends Model
{
    protected $guarded = ['id'];
    /*
     * Validations
     */
    public static function rules($update = false, $id = null)
    {
        $rules = [
            'first_name'    => 'required',
            'email'         => ['required', Rule::unique('colleagues')->ignore($id, 'id')],
            'email'         => 'email',
            'gender'        => 'required',
            'address'       => 'required',
            'phone_number'  => 'required'
        ];
        if ($update) {
            return $rules;
        }
        return array_merge($rules, [
            'email'         => 'required|unique:colleagues,email',
        ]);
    }
}
