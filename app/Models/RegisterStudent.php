<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterStudent extends Model{

    protected $fillable = [
      'id','course_id','name','email','phone','status'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
