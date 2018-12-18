<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;
use App\Categories; 
use Hash;
use Session;
use Cart;

class CartController extends Controller
{
      public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        
        $product = DB::table('product')->where('productid', $id)->get();
        
        foreach($product as $prods){
        	$pid = $prods->productid;
        	$name = $prods->productname;
        	$price = $prods->productprice;
        	$image = $prods->productpic;
        	$category = $prods->producttype;
        }

        if(!$product) {

            echo "false";

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
     
            $cart = [
                    $id => [
                    	"rowid" => $pid + 1000, 
                    	"id" => $pid,
                        "name" => $name,
                        "price" => $price,
                        "image" => $image,
                        "category" => $category,
                        "quantity" => 1,
                        "subtotal" => $price
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }
        // if item not exist in cart then add to cart with quantity = 1
         $cart[$id] = [

         				"rowid" => $pid + 1000,
            			"id" => $pid,
                        "name" => $name,
                        "price" => $price,
                        "image" => $image,
                        "category" => $category,
                        "quantity" => 1,
                        "subtotal" => $price
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
	}
}
