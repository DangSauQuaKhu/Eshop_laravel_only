@extends('layouts.admin')
@section('content')
 <div class="cart">
    <div class="cart-header">
        <h4>Category page</h4>
    </div>
    <div class="cart-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->description}}</td>
                        <td>
                            <img src="{{'assets/uploads/category/'.$item->image}}" alt="Image here" class="cate-image">
                        </td>   
                        <td>
                            <a href="{{url ('edit-category/'.$item->id)}}" class="btn btn-primary"> Edit </a>
                            <a href="{{ url('delete-category/'.$item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 </div>
    
@endsection