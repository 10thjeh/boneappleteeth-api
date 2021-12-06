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

    public function add(Request $request){
      $request->validate([
        'nama' => 'required',
        'foto' => 'nullable',
        'waktu' => 'required',
        'kesulitan' => 'required',
        'resep' => 'required',
        'author' => 'required'
      ]);

      if(ResepModel::add($request)){
        return ResepController::success();
      }

      return ResepController::failed();
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
