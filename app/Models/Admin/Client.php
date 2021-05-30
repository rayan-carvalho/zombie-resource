<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name','email','mobile','phone','cep','street','number','district','city','uf','complement'];
 

    public function sales(){
        return $this->hasMany(Sale::class);
    }

    public function resources(){
        return $this->hasMany(Resource::class);
    }

    

}
