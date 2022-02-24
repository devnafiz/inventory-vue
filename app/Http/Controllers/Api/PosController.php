<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class PosController extends Controller
{
    public function getProduct(Request $request,$id){

          $poroduct = Product::where('category_id',$id)->get();
          return response()->json($poroduct);
    }
}
