@extends('layouts.front')
@section('title')
 Welcome to Our shop
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <p> </p>
            <h2>Trending Category</h2>
            {{-- <div class="owl-carousel featured-carousel owl-theme"> --}}
                @foreach ($trending_category as $item)
                    <div class="col-md-2 ">
                      <a href="{{url('view-category/'.$item->id)}}">
                        <div class="card">
                            <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="cate image" id="img-pro">
                            <div class="card-body">
                                <h6>{{$item->name}}</h6>
                                <p>{{$item->description}}</p>
                            </div>
                        </div>
                    </a>
                    </div>
               @endforeach
            {{-- </div> --}}
            
           
        </div>
        <div class="row">
            <p></p>
            <h2>All Category</h2>
            {{-- <div class="owl-carousel featured-carousel owl-theme"> --}}
                @foreach ($category as $item)
                    <div class="col-md-2 ">
                        <a href="{{url('view-category/'.$item->id)}}">
                        <div class="card">
                            <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="cate image" id="img-pro">
                            <div class="card-body">
                                <h6>{{$item->name}}</h6>
                                <p>{{$item->description}}</p>
                            </div>
                        </div>
                    </a>
                    </div>
               @endforeach
            {{-- </div> --}}
            
           
        </div>
        
        
    </div>
</div>
@endsection
