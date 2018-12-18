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

class ProductController extends Controller
{
    public function getProducts($id)
    {	

    	$product = DB::table('product')->where('producttype', $id)->get();
		$category = DB::table('category')->get();

    	return view('user.productlist')->with(['product' => $product])->with('category',$category);
    }

    public function showCategory()
    {
    	$category = DB::table('category')->get();

    	return view("admin.showcateg")->with('category',$category);
    }

    public function insertCategory()
    {
    	$category = DB::table('category')->get();

         if(Auth::user()->level == 2){ 
    	return view('admin.createcateg')->with('category',$category);
         }
         else if(Auth::user()->level == 1){
        return view('admin.createcateg')->with('category',$category);
         }
         else{
            echo "none";
        }
    } 

    public function showProd($id)
    {
        $product = DB::table('product')->where('producttype' , $id)->get();
        $categories = DB::table('category')->where('categoryid' , $id)->get();
        $category = DB::table('category')->get();

        if(Auth::user()->level == 2){    
        return view('admin.showprods')->with('product',$product)->with('category',$category)->with('categories',$categories);
        }
        else if(Auth::user()->level == 1){
        return view('superadmin.showprods')->with('product',$product)->with('category',$category)->with('categories',$categories);
        }
        else{
            echo "none";
        }
    }

    public function uploadCateg(request $request)
    {
       if($request->hasFile('file')) {
        $filename = $request->file->getClientOriginalName();
        $request->file->move('uploads',$filename);
       }

        $categoryid = $request->input('categoryid');
        $categoryname = $request->input('categoryname');
        $categorypic = $filename;

        DB::insert('insert into category (categoryid,categoryname,categorypic) values(?,?,?)' , [$categoryid,$categoryname,$categorypic]);

        $category = DB::table('category')->get();

        return view("admin.showcateg")->with('category',$category);
    }
    public function editCateg($id)
    {
        $category = DB::table('category')->where('categoryid', $id)->get();

        if(Auth::user()->level == 2){    
        return view('admin.editcateg')->with('category',$category);
        }
        else if(Auth::user()->level == 1){
        return view('superadmin.editcateg')->with('category',$category);
        }
       else{
            echo "none";
        }
    }

    public function editcategnow(request $request)
    {
        if($request->hasFile('file')) {
        $filename = $request->file->getClientOriginalName();
        $request->file->move('uploads',$filename);
       }

        $categoryid = $request->input('categoryid');
        $categoryname = $request->input('categoryname');
        $categorypic = $filename;

        DB::update('update category set categoryname=?,categorypic=? where categoryid=?' , [$categoryname,$categorypic,$categoryid]);

        $category = DB::table('category')->get();

        if(Auth::user()->level == 2){ 
        return view("admin.showcateg")->with('category',$category);
        }
        else if(Auth::user()->level == 1){
         return view("superadmin.showcateg")->with('category',$category);
        }
         else{
            echo "none";
        }
    }

    public function deletecateg($id)
    {
       DB::delete('delete from product where producttype=?',[$id]);
       DB::delete('delete from category where categoryid=?',[$id]);

        $category = DB::table('category')->get();

        if(Auth::user()->level == 2){ 
        return view("admin.showcateg")->with('category',$category);
        }
        else if(Auth::user()->level == 1){
         return view("superadmin.showcateg")->with('category',$category);
        }
         else{
            echo "none";
        }
    }
    public function editprod($id)
    {
        $product = DB::table('product')->where('productid', $id)->get();

        $category = DB::table('category')->get();

        return view("admin.editprod")->with('product', $product)->with('category',$category);
    }

    public function editprodnow(request $request)
    {
        if($request->hasFile('file')) {
        $filename = $request->file->getClientOriginalName();
        $request->file->move('uploads',$filename);
       }

        $producttype = $request->input('producttype');
        $productid = $request->input('productid');
        $productname = $request->input('productname');
        $productdesc = $request->input('productdesc');
        $productprice = $request->input('productprice');
        $productpic = $filename;

        DB::update('update product set productname=?,productdesc=?,productprice=?,productpic=? where productid=?' , [$productname,$productdesc,$productprice,$productpic,$productid]);

        $product = DB::table('product')->where('producttype' , $producttype)->get();
        $category = DB::table('category')->get();

       if(Auth::user()->level == 2){    
        return view('admin.showprods')->with('product',$product)->with('category',$category);
        }
        else if(Auth::user()->level == 1){
        return view('superadmin.showprods')->with('product',$product)->with('category',$category);
        }
        else{
            echo "none";
        }
    }
    public function deleteprod($id)
    {
        DB::delete('delete from product where productid=?',[$id]);

       return redirect()->back();
    }
    public function createprod($id)
    {
        $categories = DB::table('category')->where('categoryid', $id)->get();

        $category = DB::table('category')->get();

       if(Auth::user()->level == 2){    
        return view('admin.createprod')->with('categories',$categories)->with('category',$category);
        }
        else if(Auth::user()->level == 1){
        return view('superadmin.createprod')->with('categories',$categories)->with('category',$category);
        }
        else{
            echo "none";
        }
    }
    public function createprodnow(request $request)
    {
        if($request->hasFile('file')) {
        $filename = $request->file->getClientOriginalName();
        $request->file->move('uploads',$filename);
       }

        $producttype = $request->input('producttype');
        $productid = $request->input('productid');
        $productname = $request->input('productname');
        $productdesc = $request->input('productdesc');
        $productprice = $request->input('productprice');
        $productpic = $filename;

        DB::insert('insert into product (productid,productname,productdesc,productprice,productpic,producttype) values(?,?,?,?,?,?)' , [$productid,$productname,$productdesc,$productprice,$productpic,$producttype]);

        $product = DB::table('product')->where('producttype' , $producttype)->get();
        $categories = DB::table('category')->where('categoryid' , $producttype)->get();
        $category = DB::table('category')->get();

       if(Auth::user()->level == 2){    
        return view('admin.showprods')->with('product',$product)->with('category',$category)->with('categories',$categories);
        }
        else if(Auth::user()->level == 1){
        return view('superadmin.showprods')->with('product',$product)->with('category',$category)->with('categories',$categories);
        }
        else{
            echo "none";
        }
    }
}
