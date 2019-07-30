<?php

namespace App\Http\Controllers;

use App\UsersProducts;
use App\Product;
use Illuminate\Http\Request;


class UsersProductsController extends Controller
{

   // Logged User Instance
   protected $loggedUser;

   /**
    * Constructor instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->loggedUser = app('Illuminate\Contracts\Auth\Guard')->user();
   }

   /**
    * Create a index method which returns Users purchased products.
    *
    * @return array
    */
   public function index()
   {

      $product = UsersProducts::where('user_id', '=', $this->loggedUser->id)->get();

      return response()->json($product);

   }

   /**
    * Add the Users Purchased product
    * Do We really need this ??
    *
    * @param $request
    */
   public function add(Request $request)
   {
      $product = new UsersProducts;

      $product->user_id = $this->loggedUser->id;
      $product->sku = $request->sku;

      $product->save();

      return response()->json($product);
   }

   /**
    * Suggestions - Recommendation action.
    * This is a  basic recommendation provided based on User purchase history
    * Logic is fetch recommended products is based on name, description of the product.
    *
    * @return array
    */
   public function suggestions()
   {
      $product = UsersProducts::where('user_id', '=', $this->loggedUser->id)->get();

      $suggested_sku = array();

      foreach ($product as $prd) {
         // As the products have a '-' forming the sku
         // we will split the context data required to match sku's
         $prd_split_data = explode("-", $prd->sku);

         $product = Product::where('sku', '!=', $prd->sku)
                     ->where('name', 'like', '%' . $prd_split_data[0] . '%')->get();

         if (count($product)) {
            $suggested_sku[] = $product;
         }
      }

      return response()->json($suggested_sku);
   }

}