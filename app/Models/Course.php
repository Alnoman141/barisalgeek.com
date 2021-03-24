<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model{

    protected $fillable = [
      'id','name','course_topic','outline','class_number','duration','image','price','offer_price','class_day','class_time','class_duration','description','seats','class_starts','class_ends','slug','status'
    ];

}
