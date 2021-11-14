<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public function properties(){
        return $this->hasMany('fields_properties');
    }
    public function fields(){
        return $this->belongsToMany('forms_fields');
    }
}
