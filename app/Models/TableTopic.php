<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableTopic extends Model
{
    //use HasFactory;
    public $table = 'tablesTopics';
    public function finalData()
    {
        return $this->hasMany("\App\Models\AddFinalData", "table_id", "table_id");
    }
    public function tableDetails(){
        return $this->hasMany("\App\Models\AddTable", "id", "table_id");
    }
    public function topic(){
        return $this->hasMany("\App\Models\Topic", "id", "topic_id");
    }
    // public function mainTopic(){
    //     return $this->belongsTo("\App\Models\Topic", "parent_id", "id");
    // }
}
