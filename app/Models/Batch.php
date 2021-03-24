<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model{

    protected $fillable = [
      'id','name','type','total_students','image','description','slug'
    ];

    public function student(){
        return $this->hasMany(Student::class);
    }
}
