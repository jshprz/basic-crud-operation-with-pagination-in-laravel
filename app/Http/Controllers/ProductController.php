<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    protected function getProduct()
    {
        $product=Product::paginate(5);
        return view('product.index',compact('product'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data,[
            'product_name'=>'required|string|max:255',
            'quantity'=>'required|integer',
            'description'=>'required|string|max:255'
        ]);
    }
    protected function addProduct(Request $request)
    {
        $inputs=$request->all();
        $validator=$this->validator($inputs);
        $validator->validate();
        if ($validator->passes()) 
        {
            $product= new Product;
            $product->product_name=$request->get('product_name');
            $product->quantity=$request->get('quantity');
            $product->description=$request->get('description');
            $product->save();
            return back()->with('flashSuccess','1 product has been added');
        }
        return back()->with('flashError',$validator->errors());
    }
    protected function deleteProduct(Request $request)
    {
        $product=Product::where('id',$request->get('id'))->delete();
        return back()->with('flashSuccess','1 product has been deleted');
    }
    protected function editProduct(Request $request)
    {
        $product=Product::where('id',$request->get('id'));
        $product->update([
            'product_name'=>$request->get('product_name'),
            'quantity'=>$request->get('quantity'),
            'description'=>$request->get('description')
        ]);
        return back()->with('flashSuccess','1 product has been updated');
    }
}
