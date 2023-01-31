@extends('layouts.admin')
@section('content')
 <div class="cart">
    <div class="cart-header">
        <h4>Edit/upadte Product</h4>
    </div>
    <div class="cart-body">
        <form action="{{url ('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select">
                        <option value="">{{$product->category->name}}</option>

                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value={{$product->name}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" value={{$product->slug}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description" rows="3" class="form-control">{{$product->small_description}}</textarea>

                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{$product->description}}</textarea>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" name="original_price" value={{$product->original_price}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" name="selling_price" value={{$product->selling_price}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" name="tax" value={{$product->tax}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" name="qty" value={{$product->qty}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{$product->status=="1"? 'checked':''}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending" {{$product->trending=="1"? 'checked':''}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta title</label>
                    <input type="text" class="form-control" name="meta_title" value={{$product->meta_title}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta keywords</label>
                    <textarea name="meta_keyword" rows="3" class="form-control">{{$product->meta_keyword}}</textarea>

                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{$product->meta_description}}</textarea>

                </div>
                @if ($product->image)
                <img src="{{'/assets/uploads/products/'.$product->image}}" alt={{$product->image}} class="cate-image">
                    
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
 </div>
    
@endsection