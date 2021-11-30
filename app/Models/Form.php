<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
      'group_id',
      'name',
    ];

    public function groups()
    {
        return $this->hasMany('groups');
    }
    public function fields(){
        return $this->hasMany('forms_fields');
    }
}
