<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioImagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
}
