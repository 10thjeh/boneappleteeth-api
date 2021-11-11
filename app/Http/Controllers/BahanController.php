<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanModel;

class BahanController extends Controller
{
    static function get(){
      $response = BahanModel::get();
      return $response->toJson(JSON_PRETTY_PRINT);
    }
}
