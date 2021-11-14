<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ResepModel extends Model
{
    public function get($id=''){
      if($id==''){
        return ResepModel::GetWithoutID();
      }
      return ResepModel::GetWithID($id);
    }

    public function GetWithoutID(){
      $query = DB::table('menu')->get();
      $query->map(function($q) {
        $q->bahan = DB::table('bahan')->join('bahan_details', 'bahan.id_bahan', '=', 'bahan_details.id_bahan')->where('id_menu', $q->id_menu)->select('bahan.id_bahan','bahan_details.nama')->get();
        $q->rating = ResepModel::GetRating($q->id_menu)?: 0;
        $q->rating_count = ResepModel::GetRatingCount($q->id_menu);
        return $q;
      });
      return $query;
    }

    public function GetWithID($id){
      $query = DB::table('menu')->where('id_menu', $id)->get();
      $query->map(function($q) {
        $q->bahan = DB::table('bahan')->join('bahan_details', 'bahan.id_bahan', '=', 'bahan_details.id_bahan')->where('id_menu', $q->id_menu)->select('bahan.id_bahan','bahan_details.nama')->get();
        $q->rating = ResepModel::GetRating($q->id_menu)?: 0;
        $q->rating_count = ResepModel::GetRatingCount($q->id_menu);
        return $q;
      });
      return $query;
    }

    public function GetRating($id){
      $query = DB::table('rating')->where('id_menu', $id)->avg('rating');
      return $query;
    }

    public function GetRatingCount($id){
      $query = DB::table('rating')->where('id_menu', $id)->count();
      return $query;
    }
}
