<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description','company_id'];

    public function products(){

        return $this->hasMany(product::class);
    }

}
