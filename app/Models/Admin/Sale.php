<?php

namespace App\Models\Admin;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['resource_id','user_id','amount','client_id'];

    public function resource(){
        return $this->belongsTo(Resource::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
