<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class FrontendController extends Controller
{
    public function index()
    {
        $featured_products= Product::where('trending','1')->take(5)->get();
        return view('frontend.index',compact('featured_products'));
    }
    public function category()
    {
        $category= Category::where('status','0')->get();
        $trending_category= Category::where('popular','1')->get();
        return view('frontend.category',compact('category','trending_category'));
    }
    public function viewcategory($id)
    {
        // if(Category::where('id',$id)->exists())
        // {
        //    $category= Category::where('id',$id)->first();
        //    $product = Product::where('cate_id',$category->id)->where('status','0');
        //    return view('frontend.products.index',compact('category','product'));

        // }
        // else{
        //     return redirect('/')->with('status','slug doesnot exists');
        // }
        $product = Product::where('cate_id',$id)->get();
        $category= Category::where('id',$id)->first();
        return view('frontend.products.index',compact('product','category'));
    }
    public function viewproduct($id,$pr_id)
    {
        // if(Category::where('id',$id)->exists())
        // {
        //    $category= Category::where('id',$id)->first();
        //    $product = Product::where('cate_id',$category->id)->where('status','0');
        //    return view('frontend.products.index',compact('category','product'));

        // }
        // else{
        //     return redirect('/')->with('status','slug doesnot exists');
        // }
        $product = Product::where('id',$pr_id)->first();
        $category= Category::where('id',$id)->first();
        return view('frontend.products.view',compact('product','category'));
    }
}
