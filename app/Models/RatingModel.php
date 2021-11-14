<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RatingModel extends Model
{
  public function rate($request){
    $username_query = DB::table('user')->where('user_key', $request->user_key)->first();
    $menu_query = DB::table('menu')->where('id_menu', $request->id_menu)->first();

    if(!$menu_query || !$username_query){
      return false;
    }

    $username = $username_query->username;
    $menu_id = $menu_query->id_menu;

    $query = DB::table('rating')->updateOrInsert([
      'id_menu' => $menu_id,
      'username' => $username,
    ],
    ['rating' => $request->rating]);

    return $query;

  }
}
