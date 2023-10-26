<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkFile extends Model
{
    public $table = 'work_links';
    public $fillable = [
        'web_id',
        'link',
        'name',
        'description'
    ];
    public function work_field(){
        return $this->belongsTo("\App\Models\WorkField", "web_id", "id");
    }
}
