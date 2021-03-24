<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model{

    protected $fillable = [
      'id','admin_id','category_id','image','site_logo','status','details','done_at'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function images(){
        return $this->hasMany(TestimonialImage::class);
    }
}
