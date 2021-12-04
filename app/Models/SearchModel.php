<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SearchModel extends Model
{
    public function username($username){
      $query = DB::table('user')->where('username', 'like', $username)->exists();
      return $query;
    }

    public function recipe($name){
      $query = DB::table('menu')->where('nama', 'like', '%'.$name.'%')->get();
      $query->map(function($q) {
        $q->bahan = DB::table('bahan')->join('bahan_details', 'bahan.id_bahan', '=', 'bahan_details.id_bahan')->where('id_menu', $q->id_menu)->select('bahan.id_bahan','bahan_details.nama')->get();
        $q->rating = ResepModel::GetRating($q->id_menu)?: 0;
        $q->rating_count = ResepModel::GetRatingCount($q->id_menu);
        return $q;
      });
      return $query;
    }
}
