<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;
class CartController extends Controller
{
    public function AddToCart(Request $request,$id){
           $product = DB::table('products')->where('id',$id)->first();

           $check = DB::table('pos')->where('pro_id',$id)->first();

           if($check){
            DB::table('pos')->where('pro_id',$id)->increment('pro_quantity');

           }else{

            $data = array();

           $data['pro_id']= $id;
           $data['pro_name'] =$product->product_name;
           $data['pro_quantity'] =1 ;
           $data['product_price'] =$product->selling_price;
           $data['sub_total'] = $product->selling_price; 

           //return response()->json($data);

           DB::table('pos')->insert($data);
           }

           

          
    }

    public function cartProduct(Request $request){

       $cart = DB::table('pos')->get();
       //dd($cart);
       return response()->json($cart);
    }


    public function removeCart($id){

         $cart = DB::table('pos')->where('id',$id)->delete();
       //dd($cart);
       return response('done');
    }
}
