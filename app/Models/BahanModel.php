<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BahanModel extends Model
{
    public function get($id=''){
      if($id==''){
        return BahanModel::GetWithoutID();
      }
      return BahanModel::GetWithID($id);
    }

    public function GetWithoutID(){
      $query = DB::table('bahan_details')->get();
      return $query;
    }

    public function GetWithID($id){
      $query = DB::table('bahan_details')->where('id_bahan', $id)->get();
      return $query;
    }
}
