<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BahanModel extends Model
{
    public function get(){
      $query = DB::table('bahan_details')->get();
      return $query;
    }
}
