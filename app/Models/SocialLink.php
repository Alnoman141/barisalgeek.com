<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model{

    protected $fillable = [
        'id','facebook_link','twitter_link','linkedin_link','dribbble_link','instagram_link','behance_link'
    ];
}
