<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infographic extends Model
{
    //use HasFactory;
    public $table = 'infographics';
    public function current_topic()
    {
        return $this->hasMany("\App\Models\CurrentTopic", "id", "current_topic_id");
    }
    public function industry()
    {
        return $this->hasMany("\App\Models\Industry", "id", "industries_id");
    }
}
