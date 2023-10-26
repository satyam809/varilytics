<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableTag extends Model
{
    //use HasFactory;
    public $table = 'table_tag';
    public $fillable = [
        'table_id',
        'tag_id'
    ];
}
