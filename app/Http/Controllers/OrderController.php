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

class OrderController extends Controller
{
    public function myOrders()
    {
    	$product = DB::table('product')->get();
    	$category = DB::table('category')->get();
    	return view('user.myorders')->with('product', $product)->with('category',$category);
    }

   public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }
            else if($request->id == "all"){
            	session()->forget('cart');
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function selectMethod($total)
    {
    	$category = DB::table('category')->get();
    	$ftotal = $total;
    	return view('user.choosemeth')->with('category',$category)->with('total',$ftotal);
    }
    public function delivery($total)
    {

    	$category = DB::table('category')->get();
    	$user = DB::table('users')->where('id', Auth::user()->id)->get(); 
    	$method = "delivery";
    	$ftotal = $total;

    	return view('user.mymethod')->with('category', $category)->with('users', $user)->with('method', $method)->with('total',$ftotal);
    }
    public function pickup($total)
    {

    	$category = DB::table('category')->get();
    	$user = DB::table('users')->where('id', Auth::user()->id)->get(); 
    	$method = "method";
    	$ftotal = $total;

    	return view('user.mymethod')->with('category', $category)->with('users', $user)->with('method', $method)->with('total',$ftotal);
    }
    public function saveMyOrder(request $request)
    {
    	$ftotal = $request->input('total');
    	$street = $request->input('street');
    	$city = $request->input('city');
    	$time = $request->input('time');
    	$rid =  mt_rand(10000000, 99999999);

    	$order = array(
    		'id' => $rid,
			'date' => date('Y-m-d'),
			'customerid' => Auth::user()->id,
			'amountpaid' => $ftotal,
			'location'	=> "$street,$city",
			'time'      => "$time",
			'method'	=> "delivery",
			'status'	=> "pending"
		);

		DB::table('orders')->insert($order);	

		$cart = session()->get('cart');

		foreach($cart as $item):
			$order_detail = array(
				'orderid'  => $rid,
				'productid' => $item['id'],
				'productname' => $item['name'],
				'quantity' => $item['quantity'],
				'price' => $item['price'],
				'total' => $ftotal
			);

		endforeach;

		DB::table('order_detail')->insert($order_detail);
		session()->forget('cart');

		$user = DB::table('users')->where('id', Auth::user()->id)->get();
        $orders = DB::table('orders')->where('id', $rid)->get();
        $order_details = DB::table('order_detail')->where('orderid',$rid)->get();
        $category = DB::table('category')->get();

        return view('user.success')->with('user' , $user)->with('orders',$orders)->with('orddetail',$order_details)->with('category', $category);

    }
     public function saveMyOrder2(request $request)
    {
        $ftotal = $request->input('total');
        $branch = $request->input('branch');
        $time = $request->input('time');
        $rid =  mt_rand(10000000, 99999999);

        $order = array(
            'id' => $rid,
            'date' => date('Y-m-d'),
            'customerid' => Auth::user()->id,
            'amountpaid' => $ftotal,
            'location'  => "$branch",
            'time'      => "$time",
            'method'    => "pick-up",
            'status'    => "pending"
        );

        DB::table('orders')->insert($order);    

        $cart = session()->get('cart');

        foreach($cart as $item):
            $order_detail = array(
                'orderid'  => $rid,
                'productid' => $item['id'],
                'productname' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $ftotal
            );

        endforeach;

        DB::table('order_detail')->insert($order_detail);
        session()->forget('cart');

        $user = DB::table('users')->where('id', Auth::user()->id)->get();
        $orders = DB::table('orders')->where('id', $rid)->get();
        $order_details = DB::table('order_detail')->where('orderid',$rid)->get();
        $category = DB::table('category')->get();

        return view('user.success')->with('user' , $user)->with('orders',$orders)->with('orddetail',$order_details)->with('category', $category);

    }

    public function showOrders()
    {
        $orders = DB::table('orders')->get();
        $users = DB::table('users')->get();
        $category = DB::table('category')->get();

        return view('admin.showorders')->with('orders' , $orders)->with('users' ,$users)->with('category', $category);


    }

    public function showOrderDetails($id)
    {   
        $order = DB::table('orders')->where('id' , $id)->get();
        $order_details = DB::table('order_detail')->where('orderid' , $id)->get();
        $category = DB::table('category')->get();

        return view('admin.orderdetails')->with('order',$order)->with('order_details',$order_details)->with('category',$category);
    }

    public function viewStatus($status)
    {
        $orders = DB::table('orders')->where('status',$status)->get();
        $users = DB::table('users')->get();
        $category = DB::table('category')->get();

        return view('admin.showorders')->with('orders' , $orders)->with('users' ,$users)->with('category', $category);
    }

    public function deliveredOrder($id)
    {
        $status = "completed";
        DB::update('update orders set status=? where id=?' , [$status,$id]);

        $who = Auth::user()->username;
        $pid = Auth::user()->id;
        $act = "$who approved Order#$id";
        $date = date('Y-m-d');

        DB::insert('insert into logs (id,logid,date,act) values(?,?,?,?)' , [null,$pid,$date,$act]);

        return redirect()->back();
    }

    public function canceledOrder($id)
    {
        
        DB::delete('delete from orders where id=?' ,[$id]);
        DB::delete('delete from order_detail where orderid=?' ,[$id]);

        $who = Auth::user()->username;
        $pid = Auth::user()->id;
        $act = "$who canceled Order#$id";
        $date = date('Y-m-d');

        DB::insert('insert into logs (id,logid,date,act) values(?,?,?,?)' , [null,$pid,$date,$act]);

        $orders = DB::table('orders')->get();
        $users = DB::table('users')->get();
        $category = DB::table('category')->get();

        return view('admin.showorders')->with('orders' , $orders)->with('users' ,$users)->with('category', $category);
    }
    public function showLogs()
    {
        $logs = DB::table('logs')->get();
        $category = DB::table('category')->get();

        return view('superadmin.showlogs')->with('logs',$logs)->with('category', $category);
    }

}
