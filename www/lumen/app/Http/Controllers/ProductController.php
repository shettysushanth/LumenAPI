<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
   /**
    * Product Index - returns all the products.
    *
    * @return json
    */
   public function index()
   {
   
      $products = Product::all();

      return response()->json($products);

   }

   /**
    * Products Create - Create a product
    *
    * @return json
    */
   public function create(Request $request)
   {
      $product = new Product;

      $product->sku = $request->sku;
      $product->name = $request->name;
      $product->price = $request->price;
      $product->description= $request->description;
      
      $product->save();

      return response()->json($product);
   }

   /**
    * Product show - Display a product by ID
    *
    * @param $id product id
    * @return json
    */
   public function show($id)
   {
      $product = Product::find($id);

      return response()->json($product);
   }

   /**
   * Product update - Update a product by ID
   *
   * @param $request object
   * @param $id product id
   * @return json
   */
   public function update(Request $request, $id)
   { 
      $product= Product::find($id);
      
      $product->sku = $request->input('sku');
      $product->name = $request->input('name');
      $product->price = $request->input('price');
      $product->description = $request->input('description');
      $product->save();
      return response()->json($product);
   }

   /**
   * Product delete - Delete a product by ID
   *
   * @param $id product id
   * @return json
   */
   public function delete($id)
   {
      $product = Product::find($id);
      $product->delete();

      return response()->json('product removed successfully');
   }

}
