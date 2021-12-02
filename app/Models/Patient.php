<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    //realación uno a muchos
    public function visits(){
        return $this->hasMany('App\Models\Visit');
    }
}

