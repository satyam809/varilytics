<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignWorkLink extends Model
{
    //use HasFactory;
    public $table = 'assign_work_link';
    public $fillable = [
        'assign_work_id',
        'work_field_id',
        'work_link_id'
    ];
    
}
