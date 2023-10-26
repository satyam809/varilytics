<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartCity extends Model
{
    //use HasFactory;
    public $table = 'smartCities';

    public static function getAllSmartCities(){
    	return self::get();
    }

}
