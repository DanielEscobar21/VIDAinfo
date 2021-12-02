<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Relación Muchos a Muchos
    public function ailments(){
        return $this->belongsToMany('App\Models\Ailment');
    }
}
