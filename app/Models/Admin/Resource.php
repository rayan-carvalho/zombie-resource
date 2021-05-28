<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name','minimum','amount','description','category_id','image'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
  
}
