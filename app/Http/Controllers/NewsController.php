<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function get(){
      $response = NewsModel::get();
      return $response->toJson(JSON_PRETTY_PRINT);
    }
}
