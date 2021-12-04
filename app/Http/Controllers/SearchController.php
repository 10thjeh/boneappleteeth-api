<?php

namespace App\Http\Controllers;

use App\Models\SearchModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function username($username){
      if(!SearchModel::username($username)){
        return response()->json([
          'status' => '200',
          'message' => 'username is available'
        ]);
      }

      return response()->json([
        'status' => '409',
        'message' => 'username is taken'
      ]);
    }

    public function resep($query){
      $response = SearchModel::recipe($query);
      return $response->toJson(JSON_PRETTY_PRINT);
    }


}
