<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id'];

    public static function rules($update = false, $id = null)
    {
    	$rules = [
    		'nama' => 'required',
    		'email' => 'required',
    		'telp' => 'required',
    		'alamat' => 'required'
    	];

    	if ($update) {
    		return $rules;
    	}
    }
}