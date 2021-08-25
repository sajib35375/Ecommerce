@extends('frontend.front_master')
@section('content')




    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>MyCart</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="cart-romove item">Image</th>
                                <th class="cart-description item">Price</th>
                                <th class="cart-product-name item">Product color</th>
                                <th class="cart-edit item">Quantity</th>
                                <th class="cart-sub-total item">Subtotal</th>
                                <th class="cart-total last-item">Remove</th>
                            </tr>
                            </thead>
                                <tbody id="cart">


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            <div class="col-md-4 col-sm-12 estimate-ship-tax">
            </div>

            <div class="col-md-4 col-sm-12 estimate-ship-tax">
                @if( Session::has('coupon') )

                @else
                <table class="table" id="couponDiscountTable">
                    <thead>
                    <tr>
                        <th>
                            <span class="estimate-title">Discount Code</span>
                            <p>Enter your coupon code if you have one..</p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <input id="coupon_name" type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                            </div>
                            <div class="clearfix pull-right">
                                <button onclick="couponApply()" type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                            </div>
                        </td>
                    </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
                @endif
            </div><!-- /.estimate-ship-tax -->

            <div class="col-md-4 col-sm-12 cart-shopping-total">
                <table class="table">
                    <thead id="couponCal">

                    </thead><!-- /thead -->
                    <tbody>
                    <tr>
                        <td>
                            <div class="cart-checkout-btn pull-right">
                                <a href="{{ route('checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>

                            </div>
                        </td>
                    </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
            </div><!-- /.cart-shopping-total -->


        </div>
        </div><!-- /.row -->

@endsection
