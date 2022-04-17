<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
    return view('admin.product');
    }
    function create(){
        return view('admin.form.add_product');
    }

    function store(Request $request){
        $val= $request->validate([
            'name'=>'required|min:5',
            'price'=>'required|min:3',
            'country'=>'required',
            'image'=>'image|nullable',

        ]);

       if($val){

           $product= new Product();
           if ($request->hasFile('image')){
               $product->name=$request->name;
               $product->price=$request->price;
               $product->country=$request->country;
               $product->image=$request->file('image')->store('images');
           }
           else{
               $product->name=$request->name;
               $product->price=$request->price;
               $product->country=$request->country;
           };

           $product->save();

           session()->flash('insert', 'malumotlar bazaga qoshiladi');
           return redirect()->back();

       }else{
           return redirect()->back()->withErrors($val);
       }

    }
    function edit(Request $request){
        $id=$request->id;
        $product=Product::where('id',$id)->get();
        $p=[];
        foreach ($product as $item){
            $p['id']=$item->id;
            $p['name']=$item->name;
            $p['price']=$item->price;
            $p['country']=$item->country;
            $p['image']=$item->image;
        }

        return view('admin.form.edit_product',['product'=>$p]);

    }
    function update(Request $request){
        $val= $request->validate([
            'name'=>'required|min:5',
            'price'=>'required|min:3',
            'country'=>'required',
            'image'=>'image|nullable',

        ]);

        $id = $request->id;

        if ($val){
            $product = Product::find($id);
            if ($request->hasFile('image')){
                $product->name=$request->name;
                $product->price=$request->price;
                $product->country=$request->country;
                $product->image=$request->file('image')->store('image');
            }
            else{
                $product->name=$request->name;
                $product->price=$request->price;
                $product->country=$request->country;
            }
            $product->save();
            session()->put('success','update data');
                return redirect('/product');
        } else{

        return redirect()->back()->withErrors($val);
    }
}
    function destory(Request $request){
        $id=$request->id;
        Product::destroy($id);
        return redirect('/product');
    }
}
