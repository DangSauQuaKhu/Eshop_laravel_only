@extends('layouts.admin')
@section('content')
 <div class="cart">
    <div class="cart-header">
        <h4>Product page</h4>
    </div>
    <div class="cart-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Original price</th>
                    <th>Selling</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{$item->category->name}}</td>
                        
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->description}}</td>
                        <td>{{ $item->original_price}}</td>
                        <td>{{ $item->selling_price}}</td>
                        <td>
                            <img src="{{'assets/uploads/products/'.$item->image}}" alt="Image here" class="cate-image">
                        </td>   
                        <td>
                            <a href="{{url ('edit-product/'.$item->id)}}" class="btn btn-primary"> Edit </a>
                            <a href="{{ url('delete-product/'.$item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 </div>
    
@endsection