<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_bien extends Model
{
public function annonce_biens(){
    return $this->hasMany("App\Annonce_bien");
    }
}
