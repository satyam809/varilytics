<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataAndLink extends Model
{
    //use HasFactory;
    public $table = 'data';


    public function data()
    {
        return $this->belongsTo("\App\Models\AddData", "id", "table_id");
    }
    public function link()
    {
        return $this->belongsTo("\App\Models\WorkFile", "link_id", "id");
    }
}
