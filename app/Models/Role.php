<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function groups()
    {
        return $this->belongsToMany(Group::class,'role_group_user','user_id','group_id','role_id');
    }
    public function users(){
        return $this->belongsToMany(User::class,'role_group_user','group_id','user_id','role_id');
    }
}
