@extends('layouts.front')
@section('title')
My cart
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-waring border-top">
    <div class="container">
        <div class="mb-0">Home / Cart / </div>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow ">
    <div class="card-body">
        @php $total =0; @endphp
            
        
        @foreach ($cartitems as $item)
            
       
        <div class="row product_data">
            <div class="col-md-2">
                <img src="{{asset('/assets/uploads/products/'.$item->product->image)}}" height="70px" width="70px" alt="Image here">
            </div>
           <div class="col-md-3">
            <h5>{{$item->product->name}}</h5>
           </div>
           <div class="col-md-2">
            <h5>{{$item->product->selling_price}} VND</h5>
           </div>
                
                    <div class="col-md-3 my-auto">
                        <input type="hidden" class="prod_id" value="{{$item->product->id}}">
                        @if($item->product->qty >=$item->prod_qty)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 110px;">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <input type="text" name="quantity"  class="form-control qty-input text-center" value="{{$item->prod_qty}}">
                            <button class="input-group-text changeQuantity increment-btn">+</button>
    
                        </div>
                        @php $total += $item->product->selling_price*$item->prod_qty; @endphp
                        @else
                        <h6>out of stock</h6>
                        @endif
                    </div>
                   
                    <div class="col-md-2">
                        <button class=" btn btn-danger delete-cart-item"> <i class="fa fa-trash"></i> Remove</button>
                    </div>
            </div>
            @php $total += $item->product->selling_price*$item->prod_qty; @endphp
            @endforeach
            
        </div>
        <div class="card-footer">
            <h6>Total Price: {{$total}} VND
                <a href="{{url('checkout')}}" class="btn btn-success float-end"> Proceed to Checkout</a>
            </h6>
        </div>
       
    </div>
    
   
</div>
    
</div>

@endsection




