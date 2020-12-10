@extends('frontend.master')
@section('content')
<div class="container-scroller">
    <!-- Start Checkout -->

    <section class="shop checkout section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('msg'))
                    <div style="margin: 30px;" class="col-12 alert alert-{{session('status')}}">
                        {{session('msg')}}
                    </div>
                    @endif
                </div>
                <div class="col-lg-7 col-12">
                    <div class="checkout-form">
                        <h2>Make Your Checkout Here</h2>
                        <p>Please register in order to checkout more quickly</p>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('f.createorder')}}">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Full Name<span>*</span></label>
                                        <input type="text" name="nameCustomer" placeholder="" required="required">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email Address<span>*</span></label>
                                        <input type="email" name="email" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phone Number<span>*</span></label>
                                        <input type="tel" name="number" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Country<span>*</span></label>
                                        <select name="country_name" id="country">
                                            <option selected value="VN">Vietnam</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>State / Divition<span>*</span></label>
                                        <select name="stateprovince" id="state-province">
                                            <option selected value="Hà Nội">Hà Nội Capital</option>

                                            <option value="Hà Giang"> Hà Giang Province</option>

                                            <option value="Cao Bằng"> Cao Bằng Province</option>

                                            <option value="Bắc Kạn"> Bắc Kạn Province</option>

                                            <option value="Tuyên Quang"> Tuyên Quang Province</option>

                                            <option value="Lào Cai"> Lào Cai Province</option>

                                            <option value="Điện Biên"> Điện Biên Province</option>

                                            <option value="Lai Châu"> Lai Châu Province</option>

                                            <option value="Sơn La"> Sơn La Province</option>

                                            <option value="Yên Bái"> Yên Bái Province</option>

                                            <option value="Hòa Bình"> Hoà Bình Province</option>

                                            <option value="Thái Nguyên"> Thái Nguyên Province</option>

                                            <option value="Lạng Sơn"> Lạng Sơn Province</option>

                                            <option value="Quảng Ninh"> Quảng Ninh Province</option>

                                            <option value="Bắc Giang"> Bắc Giang Province</option>

                                            <option value="Phú Thọ"> Phú Thọ Province</option>

                                            <option value="Vĩnh Phúc"> Vĩnh Phúc Province</option>

                                            <option value="Bắc Ninh"> Bắc Ninh Province</option>

                                            <option value="Hải Dương"> Hải Dương Province</option>

                                            <option value="Hải Phòng">Hải Phòng City</option>

                                            <option value="Hưng Yên"> Hưng Yên Province</option>

                                            <option value="Thái Bình"> Thái Bình Province</option>

                                            <option value="Hà Nam"> Hà Nam Province</option>

                                            <option value="Nam Định"> Nam Định Province</option>

                                            <option value="Ninh Bình"> Ninh Bình Province</option>

                                            <option value="Thanh Hóa"> Thanh Hóa Province</option>

                                            <option value="Nghệ An"> Nghệ An Province</option>

                                            <option value="Hà Tĩnh"> Hà Tĩnh Province</option>

                                            <option value="Quảng Bình"> Quảng Bình Province</option>

                                            <option value="Quảng Trị"> Quảng Trị Province</option>

                                            <option value="Thừa Thiên Huế"> Thừa Thiên Huế Province</option>

                                            <option value="Đà Nẵng">Đà Nẵng City</option>

                                            <option value="Quảng Nam"> Quảng Nam Province</option>

                                            <option value="Quảng Ngãi"> Quảng Ngãi Province</option>

                                            <option value="Bình Định"> Bình Định Province</option>

                                            <option value="Phú Yên"> Phú Yên Province</option>

                                            <option value="Khánh Hòa"> Khánh Hòa Province</option>

                                            <option value="Ninh Thuận"> Ninh Thuận Province</option>

                                            <option value="Bình Thuận"> Bình Thuận Province</option>

                                            <option value="Kon Tum"> Kon Tum Province</option>

                                            <option value="Gia Lai"> Gia Lai Province</option>

                                            <option value="Đắk Lắk"> Đắk Lắk Province</option>

                                            <option value="Đắk Nông"> Đắk Nông Province</option>

                                            <option value="Lâm Đồng"> Lâm Đồng Province</option>

                                            <option value="Bình Phước"> Bình Phước Province</option>

                                            <option value="Tây Ninh"> Tây Ninh Province</option>

                                            <option value="Bình Dương"> Bình Dương Province</option>

                                            <option value="Đồng Nai"> Đồng Nai Province</option>

                                            <option value="Bà Rịa - Vũng Tàu"> Bà Rịa - Vũng Tàu Province</option>

                                            <option value="Hồ Chí Minh">Hồ Chí Minh City</option>

                                            <option value="Long An"> Long An Province</option>

                                            <option value="Tiền Giang"> Tiền Giang Province</option>

                                            <option value="Bến Tre"> Bến Tre Province</option>

                                            <option value="Trà Vinh"> Trà Vinh Province</option>

                                            <option value="Vĩnh Long"> Vĩnh Long Province</option>

                                            <option value="Đồng Tháp"> Đồng Tháp Province</option>

                                            <option value="An Giang"> An Giang Province</option>

                                            <option value="Kiên Giang"> Kiên Giang Province</option>

                                            <option value="Cần Thơ">Cần Thơ City</option>

                                            <option value="Hậu Giang"> Hậu Giang Province</option>

                                            <option value="Sóc Trăng"> Sóc Trăng Province</option>

                                            <option value="Bạc Liêu"> Bạc Liêu Province</option>

                                            <option value="Cà Mau"> Cà Mau Province</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Delivery Address<span>*</span></label>
                                        <input type="text" name="deliveryaddress" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Postal Code<span>*</span></label>
                                        <input type="text" name="post" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group create-account">
                                        <input id="cbox" name="createaccount" type="checkbox">
                                        <label>Create an account?</label>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Form -->
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="order-details">
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>CART TOTALS</h2>
                            <div class="content">
                                <ul>
                                    @php
                                    $total=0;
                                    $totaloffcial=0;
                                    @endphp
                                    @if (isset($cart))
                                    @foreach ($cart as $id=>$item)
                                    @php
                                    $total += $item['price'];
                                    $totaloffcial += $item['priceoffcial']*$item['quantityBuy'];
                                    @endphp
                                    <li><b>{{$item['nameProduct']}}</b>&nbsp;x&nbsp;{{$item['quantityBuy']}}<span>{{number_format($item['priceoffcial']*$item['quantityBuy'])}}
                                            VND</span></li>
                                    @endforeach
                                    @endif
                                    <li class="last">Total<span>{{number_format($totaloffcial)}} VND</span></li>
                                </ul>
                            </div>
                        </div>
                        <!--/ End Order Widget -->
                        <div class="single-widget">
                            <h2>NOTE</h2>
                            <div class="content">
                                <div class="m-4">
                                    <textarea name="note" id="note" cols="30" rows="5">

                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>Payments</h2>
                            <div class="content">
                                <div class="m-4">
                                    <label class="checkbox-inline" for="1"><input type="radio" required value="check" name="payments"
                                            id="check">
                                        Check Payments</label><br>
                                    <label class="checkbox-inline" for="2"><input type="radio" required value="cash" name="payments"
                                            id="cash">
                                        Cash On Delivery</label><br>
                                    <label class="checkbox-inline" for="3"><input type="radio" required value="online" name="payments"
                                            id="paypal">
                                        PayPal</label>
                                </div>
                            </div>
                        </div>


                        <!--/ End Order Widget -->
                        <!-- Payment Method Widget -->
                        <div class="single-widget payement">
                            <div class="content">
                                <img src="/frontend/images/payment-method.png" alt="#">
                            </div>
                        </div>
                        <!--/ End Payment Method Widget -->
                        <!-- Button Widget -->
                        <div class="single-widget get-button">
                            <div class="content">
                                <div class="button">
                                    <button class="btn" type="submit">PROCEED TO CHECKOUT</button>
                                </div>
                                <div class="button">
                                    <a href="{{route('f.product')}}"><button class="btn">CONTINUE SHOPPING</button></a>
                                </div>
                            </div>
                        </div>
                        <!--/ End Button Widget -->
                    </div>
                </div>

            </div>
        </div>
    @csrf
    </form>
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
