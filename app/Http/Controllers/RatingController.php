<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RatingModel;

class RatingController extends Controller
{
    public function rate(Request $request){
      $request->validate([
        'user_key' => 'required',
        'id_menu' => 'required',
        'rating' => 'required'
      ]);

      if(RatingModel::rate($request)){
        return RatingController::success();
      }

      return RatingController::failed();
    }

    public function success(){
      return response()->json([
        'status' => '200',
        'message' => 'success'
      ]);
    }

    public function failed(){
      return response()->json([
        'status' => '409',
        'message' => 'error'
      ]);
    }
}
