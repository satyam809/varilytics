<?php

namespace App\Models;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taging extends Model
{
    //use HasFactory;
    public $table = 'taging';


    public function topics()
    {
        return $this->belongsTo("\App\Models\Topic", "topic_id", "id");
    }
    public function subTopics()
    {
        return $this->belongsTo("\App\Models\Topic", "sub_topic_id", "id");
    }
    public function country()
    {
        return $this->belongsTo("\App\Models\Country", "country_id", "country_id");
    }
    public function state()
    {
        return $this->belongsTo("\App\Models\State", "state_id", "id");
    }
    public function district()
    {
        return $this->belongsTo("\App\Models\District", "district_id", "id");
    }
    public function TableTag()
    {
        return $this->hasMany("\App\Models\TableTag", "tag_id", "id");
    }
}
