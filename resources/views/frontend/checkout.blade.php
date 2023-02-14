@extends('layouts.front')
@section('title')
 Checkout
@endsection
@section('content')
    <div class="container mt-3">
        <form action="{{url('place-order')}}" method="POST">
            {{csrf_field()}}
       <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic details</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="fname" placeholder="Enter first name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter last name">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email"placeholder="Enter Email">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone number</label>
                            <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 1</label>
                            <input type="text" class="form-control" value="{{Auth::user()->address1}}" name="address1" placeholder="Enter Address 1">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 2</label>
                            <input type="text" class="form-control" value="{{Auth::user()->address2}}" name="address2" placeholder="Enter Address 2">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">City</label>
                            <input type="text" class="form-control" value="{{Auth::user()->city}}" name="city" placeholder="Enter city">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">State</label>
                            <input type="text" class="form-control"  value="{{Auth::user()->state}}" name = "state" placeholder="Enter State">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control" value="{{Auth::user()->country}}" name="country" placeholder="Enter Country">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Pin code</label>
                            <input type="text" class="form-control" value="{{Auth::user()->pincode}}" name="pincode" placeholder="Enter Pin code">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                   <h6> Order Details </h6>
                    <hr>
                    <table class="table table-strped table-bordered">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Quantity</td>
                                <td>Price</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartitems as $item)
                            <tr>
                                <td> {{$item->product->name}} </td>
                                <td> {{$item->prod_qty}}</td>
                                <td> {{$item->product->selling_price}} </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button class="btn btn-primary float-end">Place Order</button>
                   
                
            </div>
           </div>
       </div>
    </form>
        
    </div>
    

@endsection
