@extends('frontend.master')
@section('content')
<!-- Product Style -->
<section class="product-area shop-sidebar shop section">
    <div class="container" style="margin: 150px 70px 0px 150px;">
        <div class="row">
            <div class="col-12">
                @if (session('msg'))
                <div class="col-12 alert alert-{{session('status')}}">
                    {{session('msg')}}
                </div>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-left: 150px;">
                <img src="{{$item->img}}" width="300px;" width="300px;" alt="#">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="quickview-content">
                    <h2>{{$item->product_name}}</h2>
                    <div class="quickview-ratting-review">
                        <div class="quickview-ratting-wrap">
                            <div class="quickview-ratting">
                                <i class="yellow fa fa-star"></i>
                                <i class="yellow fa fa-star"></i>
                                <i class="yellow fa fa-star"></i>
                                <i class="yellow fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <a href="#"> (1 customer review)</a>
                        </div>
                        <div class="quickview-stock">
                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                        </div>
                    </div>
                    @if ($item->sale && $item->sale>0)
                    <small><s>{{number_format($item->price)}} VND</s></small>
                    <strong class="new">{{number_format($item->price-$item->sale)}} VND</strong>
                    @else
                    <strong class="new">{{number_format($item->price)}} VND</strong>
                    @endif
                    <div class="quickview-peragraph">
                        <strong>{{$item->product_describe}}</strong>
                        <div>
                            {{$item->product_detail}}
                        </div>
                    </div>

                    <form action="{{route('f.addtocart')}}" method="POST">
                        <div class="quantity">
                        <!-- Input Order -->

                        <div class="input-group">
                            <div class="button minus">
                                <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                    data-type="minus" data-field="quantity[1]">
                                    <i class="ti-minus"></i>
                                </button>
                            </div>
                            <input type="text" id="quantity" name="quantity[1]" class="input-number" data-min="1" data-max="1000"
                                value="1">
                            <div class="button plus">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                    data-field="quantity[1]">
                                    <i class="ti-plus"></i>
                                </button>
                            </div>
                        </div>

                        <!--/ End Input Order -->
                    </div>
                    <div class="add-to-cart">
                        <button type="submit" class="btn">Add to cart</button>
                        <a href="#" class="btn min"><i class="ti-heart"></i></a>
                        <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                    </div>
                    <div class="input-group">
                        <input type="hidden" name="idProduct" value="{{$item->id}}">
                    </div>
                    @csrf
                    </form>
                    <div class="default-social">
                        <h4 class="share-now">Share:</h4>
                        <ul>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Product Style 1  -->

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
@endsection
