<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plates(){
        return $this->belongsToMany('App\Models\Plate');
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    use HasFactory;
}
