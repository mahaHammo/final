<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
       // $products = DB::table('products')->get();
        $products = Product::orderBy('created_at')->get();
         return view('products.index',compact('products'));
    }

    public function show($name){
        //$product = DB::table('products')->find($name);
        $product = Product::where('name' , $name)->get();
        return view('products.show', compact('products'));
    }

    public function store(Request $request){
       $request->validate([
         'name' =>'required|min:10|max:255',
       ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->time = now();
        $product->save();

         return redirect()->back();

    }
    public function destroy($name){
    
      $product = Product::find($name);
      $product->delete();
        return redirect()->back();
    }

    public function showupdate($name){
       
        $product=Product::find($name);
        $product->name = 'New Name';
        $product->save();
        return view('products.update',compact('product_edit','products'));   
    }

    public function Update(Request $request,$name){ 

      //  DB::table('productss')->where('name', $name)->update(['name' => $request->name,
       //  'time' => now(),
        // ]);
        $request->validate([
          'name' =>'required|min:10|max:255',
        ]);
        Product::where('name',$name)->update(['name'=> $request->name]);
        return redirect('/'); 

    }
    public function create(Request $request)
      {
	     $this->validate($request,[
        'title' => 'required',
        'details' => 'required'
        ]);
	    $items = Item::create($request->all());
	   return back()->with('success','Item created successfully!');
     }
     
}
