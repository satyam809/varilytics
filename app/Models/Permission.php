<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    protected $table = 'permission';
    protected $fillable = [
        'user_id', 'role_id','designation_id'
    ];
    public function User(){
        return $this->belongsTo("\App\Models\Users", "user_id", "id");
    }
}
