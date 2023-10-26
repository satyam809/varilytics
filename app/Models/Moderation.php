<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moderation extends Model
{
    //use HasFactory;
    public $table = 'tag';


    public function AddTable()
    {
        return $this->belongsTo("\App\Models\AddTable", "tag_id", "id");
    }
}
