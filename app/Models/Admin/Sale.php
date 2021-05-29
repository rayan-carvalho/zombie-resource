<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['resource_id','user_id ','amount'];
}
