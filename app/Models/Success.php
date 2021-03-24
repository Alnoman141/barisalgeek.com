<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Success extends Model{

    protected $fillable = [
      'id','student_id','course_id','batch_id','image'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
