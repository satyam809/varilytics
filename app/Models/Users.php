<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table = 'varistats_users';
    public $fillable = [
        'name',
        'email',
        'username',
        'password'
    ];
    public function permission()
    {
        return $this->belongsTo("\App\Models\Permission", "id", "user_id");
    }
    public function table()
    {
        return $this->hasMany("\App\Models\AddTable", "user_id", "id");
    }
}
