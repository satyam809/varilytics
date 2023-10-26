<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkField extends Model
{
    //use HasFactory;
    public $table = 'work_fields';
    public $fillable = [
        'website',
        'acronym',
        'org_name',
        'sector',
        'domain'
    ];
}
