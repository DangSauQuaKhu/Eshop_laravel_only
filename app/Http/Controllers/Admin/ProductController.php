<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index',compact('product'));
    }
    public function add()
    {
        $category= Category::all();
        return view('admin.product.add',compact('category'));
    }
    public function insert(Request $request)
    {
        $product = new Product();
        if($request->hasFile('image'))
        {  // echo "have file";
            $file = $request->file('image');
            $ext= $file->getClientOriginalName();
            $filename= time().'.'.$ext;
            $file->move('assets/uploads/products',$filename);
            $product->image= $filename;
        }
        $product->cate_id= $request->input('cate_id');
        $product->name= $request->input('name');
        $product->slug=$request->input('slug');
        $product->small_description=$request->input('small_description');

        $product->description=$request->input('description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->tax=$request->input('tax');
        $product->qty=$request->input('qty');

        $product->status= $request->input('status')==TRUE?'1':'0';
        $product->trending= $request->input('trending')==TRUE?'1':'0';
        $product->meta_title=$request->input('meta_title');
        $product->meta_keyword=$request->input('meta_keyword');
        $product->meta_description=$request->input('meta_description');
        $product->save();
        return redirect('products')->with('status',"Product add successfully");

    }
    public function edit($id)
    {
        $product=Product::find($id);
        return view('admin.product.edit',compact('product'));
    }
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        if($request->hasFile('image'))
        {
            $path= 'assets/uploads/category/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext= $file->getClientOriginalName();
            $filename= time().'.'.$ext;
            $file->move('assets/uploads/products',$filename);
            $product->image  =$filename;
        }
       // $product->cate_id= $request->input('cate_id');
        $product->name= $request->input('name');
        $product->slug=$request->input('slug');
        $product->small_description=$request->input('small_description');

        $product->description=$request->input('description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->tax=$request->input('tax');
        $product->qty=$request->input('qty');

        $product->status= $request->input('status')==TRUE?'1':'0';
        $product->trending= $request->input('trending')==TRUE?'1':'0';
        $product->meta_title=$request->input('meta_title');
        $product->meta_keyword=$request->input('meta_keyword');
        $product->meta_description=$request->input('meta_description');
        $product->update();
        return redirect('products')->with('status','products update succesfully');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->image)
        {
            $path= 'assets/uploads/products/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            
        }
        $product->delete();
        return redirect('products')->with('status','delete succesfully');
    }
}
