<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model{

    protected $fillable = [
        'id','title','sub_title','image','status','button_text','button_link','admin_id'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
