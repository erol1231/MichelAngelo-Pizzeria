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

class UserController extends Controller
{
    public function editUser()
    {
    	$id = Auth::user()->id;
    	$category = DB::table('category')->get();
    	$user = DB::table('users')->where('id',$id)->get();

    	return view('user.edit')->with('category', $category)->with('user',$user);
    }

    public function updateUser(request $request)
    {
    	$id = Auth::user()->id;
   
    	$fname = $request->input('fname');
    	$lname = $request->input('lname');
    	$contact = $request->input('contact');
  		$username = Auth::user()->username;
  	
 
    	DB::update('update users set fname=?,lname=?,contact=? where id=?' , [$fname,$lname,$contact,$id]);
    	
    	return redirect()->route('user.profile');
    }
    public function changePass()
    {
    	$id = Auth::user()->id;
    	$category = DB::table('category')->get();
    	$user = DB::table('users')->where('id',$id)->get();

    	return view('user.changepass')->with('category', $category)->with('user',$user);


    }
    public function changeNow(request $request)
    {
    	$id = Auth::user()->id;

    	$password = Hash::make($request->input('newpassword'));

    	DB::update('update users set password=? where id=?' , [$password,$id]);

    	return redirect()->route('user.profile');
 
    }

    public function getCustomers($level)
    {
        $customers = DB::table('users')->where('level' , $level)->get();
        $category = DB::table('category')->get();

        if(Auth::user()->level == 2){    
        return view('admin.showcustom')->with('users',$customers)->with('category',$category);
        }
        else if(Auth::user()->level == 1){
        return view('superadmin.showcustom')->with('users',$customers)->with('category',$category);
        }
        else{
            echo "none";
        }
    }

    public function getCustomerOrderRec($id)
    {
        $orders = DB::table('orders')->where('customerid',$id)->get();
        $user = DB::table('users')->where('id',$id)->get();
        $category = DB::table('category')->get();

        if(Auth::user()->level == 2){ 
        return view('admin.showcustomord')->with('orders',$orders)->with('users',$user)->with('category',$category);
        }
        else if(Auth::user()->level == 1){
        return view('superadmin.showcustomord')->with('orders',$orders)->with('users',$user)->with('category',$category);
        }
        else{
            echo "none";
        }
    }

    public function viewCustomerOrderRec($id)
    {
        $order_details = DB::table('order_detail')->where('orderid' , $id)->get();
        $orders = DB::table('orders')->where('id' , $id)->get();
        $category = DB::table('category')->get();

        if(Auth::user()->level == 2){ 
        return view('admin.viewcustomord')->with('orders',$orders)->with('order_det',$order_details)->with('category',$category);
        }
        else if(Auth::user()->level == 1){
        return view('superadmin.viewcustomord')->with('orders',$orders)->with('order_det',$order_details)->with('category',$category);
        }
        else{
            echo "none";
        }
    }

    public function getAllUsers()
    {
        $users = DB::table('users')->get();
        $category = DB::table('category')->get();

        if(Auth::user()->level == 2){ 
        return view('admin.showallusers')->with('users',$users)->with('category',$category);
        }
        else if(Auth::user()->level == 1){
        return view('superadmin.showallusers')->with('users',$users)->with('category',$category);
        }
        else{
            echo "none";
        }
    }

    public function createAdmin()
    {
        $category = DB::table('category')->get();

        return view('superadmin.createadmin')->with('category',$category);
    }

    public function registerAdmin(request $request)
    { 

        $fname=$request->input('fname');
        $lname=$request->input('lname');
        $user=$request->input('user');
        $password=Hash::make($request->input('pass'));
        $email=$request->input('email');
        $contact=$request->input('number');
        $level = 2;
        $token=$request->input('_token');

        DB::insert('insert into users (id,fname,lname,username,password,email,contact,level,remember_token) values(?,?,?,?,?,?,?,?,?)' , [null,$fname,$lname,$user,$password,$email,$contact,$level,$token]);

        $customers = DB::table('users')->where('level' , $level)->get();
        $category = DB::table('category')->get();

        if(Auth::user()->level == 2){    
        return view('admin.showcustom')->with('users',$customers)->with('category',$category);
        }
        else if(Auth::user()->level == 1){
        return view('superadmin.showcustom')->with('users',$customers)->with('category',$category);
        }
        else{
            echo "none";
        }
    }

    public function deleteAdmin($id)
    {
        
        DB::delete('delete from users where id=?',[$id]);

        return redirect()->back();
    }

}
