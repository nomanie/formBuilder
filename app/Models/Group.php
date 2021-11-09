<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Group extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'creator_id',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class,'group_user');
    }
    public function roles(){
        return $this->belongsToMany(Role::class,'role_group_user')->withPivot('role_id','user_id','group_id');
    }
    public function invites(){
        return $this->belongsToMany(User::class,'invitations');
    }
}
