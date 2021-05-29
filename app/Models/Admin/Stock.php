<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Stock extends Model
{
    protected $fillable = ['resource_id','user_id','amount'];

    public function resource(){
        return $this->belongsTo(Resource::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
