<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $table = 'districts';

    public function stateName(){
        return $this->belongsTo("\App\Models\State", "state_id", "id");
    }
}
