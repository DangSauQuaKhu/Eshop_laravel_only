@extends('layouts.front')
@section('title')
{{$category->name}}
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
            {{-- <div class="owl-carousel featured-carousel owl-theme"> --}}
                @foreach ($product as $item)
                    <div class="col-md-2 ">
                        <a href="{{url('view-category/'.$category->id.'/'.$item->id)}}">
                        <div class="card">
                            <img src="{{asset('/assets/uploads/products/'.$item->image)}}" alt="product image" id="img-pro">
                            <div class="card-body">
                                <h6>{{$item->name}}</h6>
                               <span class="float-start">{{$item->original_price}} VND</span>

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