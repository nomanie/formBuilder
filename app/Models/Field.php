<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    public function forms(){
        return $this->belongsTo('forms');
    }
    public function type(){
        return $this->hasOne('fields_types');
    }
    public function setting(){
        return $this->hasMany('fields_settings');
    }
    public function complete(){
        return $this->hasMany('complete_forms');
    }


}
