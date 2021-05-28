<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name','email','mobile','phone','cep','street','number','district','city','uf','complement'];



}
