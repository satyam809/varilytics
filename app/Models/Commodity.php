<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table = 'commodities';

    // public function mandiprice()
    // {
    //     return $this->hasMany("App\Models\MandiPrice", 'commodity_id', 'id');
    // }
}
