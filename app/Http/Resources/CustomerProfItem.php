<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerProfItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_user' => $this->id_user,
            'nama' => $this->nama,
            'tanggal_lahir' => $this->tanggal_lahir,
            'fotoktp' => $this->fotoktp,
            'noktp' => $this->noktp,
            'alamat' => $this->alamat,
            'jeniskelamin' => $this->jeniskelamin,
            'fotopribadi' => $this->fotopribadi,
            'email' => $this->email,
            'password' => $this->password,
            'api_token' => $this->api_token,
            'remember_token' => $this->remember_token,
            'role' => $this->role,
            'status' => $this->status
        ];
    }
}
