@extends('frontend.master')
@section('content')
<div class="container-scroller" style="margin: 150px 0px 0px 0px;">
    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container-fluid" style="padding: 0px 150px 0px 150px;">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('f.updatecart')}}" method="post">
                        <!-- Shopping Summery -->
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th class="text-center">PRICE</th>
                                    <th class="text-center">SALE</th>
                                    <th class="text-center">PRICE OFFCIAL</th>
                                    <th class="text-center">QUANTITY</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total=0;
                                $sale=0;
                                $totaloffcial=0;
                                @endphp
                                @if (isset($cart))
                                @foreach ($cart as $id=>$item)
                                @php
                                $total += $item['price']*$item['quantityBuy'];
                                $sale += $item['sale'];
                                $totaloffcial += $item['priceoffcial']*$item['quantityBuy'];
                                //echo $totaloffcial; exit;
                                @endphp
                                <tr>
                                    <td class="image" data-title="No"><img src="{{$item['img']}}" alt="#">
                                    </td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a
                                                href="{{route('f.showproduct',[$item['id']])}}">{{$item['nameProduct']}}</a>
                                        </p>
                                        <p class="product-des">{{$item['nameProduct']}}</p>
                                    </td>
                                    <td class="price" data-title="Price"><span>{{number_format($item['price'])}}
                                            VND</span></td>
                                    <td class="price" data-title="Sale"><span>{{number_format($item['sale'])}}
                                            VND</span></td>
                                    <td class="price" data-title="Sale"><span>{{number_format($item['priceoffcial'])}}
                                            VND</span></td>
                                    <td class="qty" data-title="Qty">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <input type="number" name="quantity[{{$id}}]"
                                                value="{{$item['quantityBuy']}}" />
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total">
                                        <span>{{number_format($item['priceoffcial']*$item['quantityBuy'])}} VND</span>
                                    </td>
                                    <td class="action" data-title="Remove"><a
                                            onclick="return confirm('Do you want to delete it?')"
                                            href="{{route('f.removeitem',[$item['id']])}}"><i
                                                class="ti-trash remove-icon"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <button class="btn">Apply</button>
                                        <button type="submit" class="btn">Update Cart</button>
                                    </div>
                                </div>
                                @if (session('msg'))
                                <div style="margin: 30px;" class="col-12 alert alert-{{session('status')}}">
                                    {{session('msg')}}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Total<span>{{number_format($total)}} VND</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>You Save<span>{{number_format($sale)}} VND</span></li>
                                        <li class="last">You Pay<span>{{number_format($totaloffcial)}} VND</span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="{{route('f.checkout')}}" class="btn">Checkout</a>
                                        <a href="{{route('f.product')}}" class="btn">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @csrf
                    </form>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section" style="padding:50px;">
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
    <!-- End Shop Newsletter -->
</div>
@endsection
