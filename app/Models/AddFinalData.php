<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFinalData extends Model
{
    //use HasFactory;
    public $table = 'final_data';
    public $fillable = [
        'data_id',
        'user_id',
        'table_id',
        'column_name',
        'values',
        'status',
        'issued_by'
    ];
    public function table()
    {
        return $this->belongsTo("\App\Models\AddTable", "table_id", "id");
    }
    public function user()
    {
        return $this->belongsTo("\App\Models\Users", "user_id", "id");
    }
}
