<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddData extends Model
{
    //use HasFactory;
    public $table = 'data';
    public $fillable = [
        'user_id',
        'web_id',
        'link_id',
        'table_id',
        'table_name',
        'column_name',
        'values',
        //'status'
    ];
    public function table()
    {
        return $this->belongsTo("\App\Models\AddTable", "table_id", "id");
    }
    public function website()
    {
        return $this->belongsTo("\App\Models\WorkField", "web_id", "id");
    }
    public function work_link()
    {
        return $this->belongsTo("\App\Models\WorkFile", "link_id", "id");
    }
    public function user()
    {
        return $this->belongsTo("\App\Models\Users", "user_id", "id");
    }
    public function finalData()
    {
        return $this->belongsTo("\App\Models\AddFinalData", "id", "data_id");
    }
}
