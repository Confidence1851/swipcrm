<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable=[
     'total' , 'username' , 'status' , 'quantity' ,'name' ,'price'
    ];

    public function cashier(){
        return $this->belongsTo(User::class , 'username');
    }
}
