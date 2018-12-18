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

class LoginController extends Controller
{
    public function home(request $request)
    {
         $category = DB::table('category')->get();
            return view('/home')->with('category',$category);
    }
    public function login()
    {
      if(Auth::check()){
        return redirect()->route('user.profile');
      }
      else{
        return redirect('/login');
      }
    }

    public function registerme(request $request)
    { 

    	$fname=$request->input('fname');
    	$lname=$request->input('lname');
    	$user=$request->input('user');
    	$password=Hash::make($request->input('pass'));
    	$email=$request->input('email');
    	$contact=$request->input('number');
    	$level = 3;
      $token=$request->input('_token');

    	DB::insert('insert into users (id,fname,lname,username,password,email,contact,level,remember_token) values(?,?,?,?,?,?,?,?,?)' , [null,$fname,$lname,$user,$password,$email,$contact,$level,$token]);

    	return redirect('/login');
    }

    public function loginme(request $request)
    {
        $this->validate($request,[
        'username' =>'required',
        'password'=>'required'
      ]);

      if(Auth::attempt(['username'=>$request->input('username'), 'password'=>$request->input('password')]))
        {
          return redirect()->route('user.profile');
        }
        else{
        echo "false";
        }
    }
    public function getProfile(request $request)
    {
      $category = DB::table('category')->get();
      if(Auth::user()->level == 3){
        return view('user.profile')->with('category',$category);
      }
      else if(Auth::user()->level == 1){
        return view('superadmin.profile')->with('category',$category);
      }
      else{
        return view('admin.profile')->with('category',$category);
      }
    }

    public function logmeout()
    {
      Auth::logout(); 
      session()->forget('cart');
      return redirect()->route('home');
    }

}