<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{

    protected $fillable = [
        'id','student_id','course_id','batch_id','first_name','last_name','name','image','status'
    ];

    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
