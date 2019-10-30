<?php

namespace App;
use App\Users;
use App\Roles;
use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{   
    protected $table = "user_role";
    protected $fillable = [
         'user_id','role_id'
    ];
    public function user(){
        return $this->hasMany(Users::class, 'user_id');
    }
    public function role(){
        return $this->belongsTo(Roles::class, 'role_id');
    }
}
