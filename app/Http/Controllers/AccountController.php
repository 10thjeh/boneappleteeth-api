<?php

namespace App\Http\Controllers;

use App\Models\AccountModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class AccountController extends Controller
{
  public function register(Request $request){
    $request->validate([
      'username' => 'required',
      'email' => 'required|email',
      'password' => 'required',
      'foto' => 'nullable',
      'alamat' => 'required'
    ]);

    if(AccountModel::register($request)){
      return AccountController::success($request->username);
    }

    return AccountController::failed();
  }

  public function login(Request $request){
    $request->validate([
      'username' => 'required',
      'password' => 'required'
    ]);

    if(AccountModel::login($request)){
      $response = AccountModel::get($request->username);
      return $response;
    }

    return AccountController::failed();
  }

  public function success($username){
    $user_key = AccountModel::GetUserKey($username);
    return response()->json([
      'status' => '200',
      'message' => $user_key
    ]);
  }

  public function failed(){
    return response()->json([
      'status' => '409',
      'message' => 'username is taken'
    ]);
  }

  public function test(){
    return response()->json([
      'status' => '409',
      'message' => 'request cannot be validated'
    ]);
  }

  public function new_success(){
    return response()->json([
      'status' => '200',
      'message' => 'success'
    ]);
  }

  public function update(Request $request){
    $request->validate([
      'username' => 'required',
      'email' => 'required|email',
      'alamat' => 'required'
    ]);

    if(AccountModel::account_update($request)){
      return AccountController::new_success();
    }
    return AccountController::failed();
  }

  public function del(Request $request){
    $request->validate([
      'username' => 'required'
    ]);

    if(AccountModel::account_delete($request)){
      return AccountController::new_success();
    }

    return AccountController::failed();
  }

}
