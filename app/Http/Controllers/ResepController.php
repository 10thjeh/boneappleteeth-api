<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResepModel;

class ResepController extends Controller
{
    public function get($id=''){
      $response = ResepModel::get($id);
      return $response->toJson(JSON_PRETTY_PRINT);
    }
}
