<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model{

    protected $fillable = [
      'admin_id','category_id','title','description','rating','website','project_type','status','tags','completed'
    ];

    public function images(){
        return $this->hasMany(PortfolioImage::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
