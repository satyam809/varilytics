<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignWork extends Model
{
    //use HasFactory;
    public $table = 'assign_work';
    public $fillable = [
        'users',
        'work_field_id',
        'table_id',
        'assigned_date'
    ];
    public function users()
    {
        return $this->belongsTo("\App\Models\Users", "users", "id");
    }
    public function work_field()
    {
        return $this->belongsTo("\App\Models\Workfield", "work_field_id", "id");
    }
}
