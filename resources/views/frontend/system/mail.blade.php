@extends('frontend.master2')
@section('content')
<div class="container-scroller">
    <!-- Start Checkout -->

    <section class="shop checkout section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="checkout-form">
                        <h2>Send Mail</h2>
                        <p>Please</p>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('f.mailpost')}}">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Email Address<span>*</span></label>
                                        <input type="email" name="email" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Subject<span>*</span></label>
                                        <input type="text" name="subject" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Note<span>*</span></label>
                                        <textarea name="note" id="note" cols="30" rows="5">

                                        </textarea>
                                    </div>
                                </div>
                        </div>
                        <!--/ End Payment Method Widget -->
                        <!-- Button Widget -->
                        <div class="single-widget get-button">
                            <div class="content">
                                <div class="button">
                                    <button type="submit" class="btn">SEND</button>
                                </div>
                            </div>
                        </div>
                        <!--/ End Button Widget -->
                        @csrf
                        </form>
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
