<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialImage extends Model{


    protected $fillable = [
      'id','testimonial_id','image'
    ];
}
