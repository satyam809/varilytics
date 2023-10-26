<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddTable extends Model
{
    public $table = 'tables';
    public $fillable = [
        'assign_work_id',
        'work_field_id',
        'work_link_id',
        'name',
        'rows',
        'columns',
        'file_name',
        'topic_id'
    ];
    public function topic()
    {
        return $this->belongsTo("\App\Models\Topic", "topic_id", "id");
    }
    public function finalData()
    {
        //return $this->hasMany("\App\Models\AddFinalData", "table_id", "id")->limit(101);
        return $this->hasMany("\App\Models\AddFinalData", "table_id", "id");
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
    public function smartCity()
    {
        return $this->belongsTo("\App\Models\SmartCity", "smartCity_id", "id");
    }
    public function tableTopic(){
        // if($searchTag == 1){
        //     return $this->belongsTo("\App\Models\TableTopic", "table_id", "id");
        // }else if($searchTag == 0){
        //     return $this->belongsTo("\App\Models\TableTopic", "table_id", "id");
        // }
        return $this->hasMany("\App\Models\TableTopic", "table_id", "id");
    }
    // public function tableTopicExist(){
    //     return $this->belongsTo("\App\Models\TableTopic", "table_id", "id");
    // }
    // public function tableTopicNotExist(){
    //     return $this->belongsTo("\App\Models\TableTopic", "id", "table_id");
    // }
    public function dataset(){
        return $this->belongsTo("\App\Models\DataSet", "dataSets_id", "id");
    }
    
}
