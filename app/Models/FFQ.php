<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FFQ extends Model{

    protected $fillable = [
        'id','question','answer'
    ];
}
