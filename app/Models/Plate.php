<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{

    public function plate()
    {
        return $this->belongsTo(restaurant::class);
    }
    use HasFactory;
}
