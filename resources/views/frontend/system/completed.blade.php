@extends('frontend.master')
@section('content')
<div class="container-scroller">
    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="checkout-form">
                        <center><h2>YOUR ORDER {{$order->id}}</h2><br><small class="text-success">Successfully</small><br></center>
                        <p>ORDER DATE {{$order->order_date}}</p>
                        <p>PAYMENT {{$order->payment}}</p>
                        <p>TOTAL {{number_format($order->total)}} VND</p>
                        <p>DELIVERY FEE {{number_format($order->delivery_fee)}} VND</p>
                        <p>FULLNAME {{$order->nameBill}}</p>
                        <p>TEL {{$order->telBill}} VND</p>
                        <address>DELIVERY ADDRESS {{$order->deliveryAddress}}</address>
                        <center>
                            <div style="margin: 20px 0px 20px 0px;">
                                <strong>Thank you for trusting and shopping with us</strong>
                            </div>
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <a href="{{route('f.product')}}"><button class="btn">CONTINUE SHOPPING</button></a>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Checkout -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services -->

    <!-- Start Shop Newsletter  -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->
</div>
@endsection
