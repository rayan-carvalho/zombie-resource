<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name','minimum','description','category_id','image','note','amount'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function stocks(){

        return $this->hasMany(Stock::class);
    }
  
}
