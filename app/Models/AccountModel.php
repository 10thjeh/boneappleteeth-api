<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountModel extends Model
{
    public function register($request){
      $password = Hash::make($request->password);
      $user_key = md5(microtime());
      $query = DB::table('user')->insert([
        'username' => $request->username,
        'email' => $request->username,
        'password' => Hash::make($request->password),
        'foto' => $request->foto,
        'alamat' => $request->alamat,
        'user_key' => $user_key
      ]);

      return $query;
    }

    public function login($request){
      $query = DB::table('user')->where('username', $request->username)->first();
      return Hash::check($request->password, $query->password);
    }

    public function GetUserKey($username){
      $query = DB::table('user')->where('username', $username)->first();
      return $query->user_key;
    }
}
