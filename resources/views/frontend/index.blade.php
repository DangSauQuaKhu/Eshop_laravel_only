@extends('layouts.front')
@section('title')
 Welcome to Our shop
@endsection
@section('content')
@include('layouts.inc.slider')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Feature Products</h2>
            {{-- <div class="owl-carousel featured-carousel owl-theme"> --}}
                @foreach ($featured_products as $item)
                    <div class="col-md-2 ">
                        <div class="card">
                            <img src="{{asset('/assets/uploads/products/'.$item->image)}}" alt="product image" id="img-pro">
                            <div class="card-body">
                                <h6>{{$item->name}}</h6>
                               <span class="float-start">{{$item->original_price}} VND</span>

                            </div>
                        </div>
                    </div>
               @endforeach
            {{-- </div> --}}
            
           
        </div>
        
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
    
@endsection