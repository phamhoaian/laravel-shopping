@extends('master')

@section('content')
<section id="featured" class="row mt40">
    <div class="container">
        <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span></h1>
        <ul class="thumbnails">
            <li class="span3">
                <a class="prdocutname" href="product.html">Product Name Here</a>
                <div class="thumbnail">
                    <span class="sale tooltip-test">Sale</span>
                    <a href="#"><img alt="" src="{!! asset('public/front/img/product1.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="span3">
                <a class="prdocutname" href="product.html">Product Name Here</a>
                <div class="thumbnail">
                    <a href="#"><img alt="" src="{!! asset('public/front/img/product2.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="span3">
                <a class="prdocutname" href="product.html">Product Name Here</a>
                <div class="thumbnail">
                    <span class="offer tooltip-test">Offer</span>
                    <a href="#"><img alt="" src="{!! asset('public/front/img/product1.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="span3">
                <a class="prdocutname" href="product.html">Product Name Here</a>
                <div class="thumbnail">
                    <a href="#"><img alt="" src="{!! asset('public/front/img/product2.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<section id="latest" class="row">
    <div class="container">
        <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
        <ul class="thumbnails">
            <li class="span3">
                <a class="prdocutname" href="product.html">Product Name Here</a>
                <div class="thumbnail">
                    <a href="#"><img alt="" src="{!! asset('public/front/img/product1a.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="span3">
                <a class="prdocutname" href="product.html">Product Name Here</a>
                <div class="thumbnail">
                    <a href="#"><img alt="" src="{!! asset('public/front/img/product2a.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="span3">
                <a class="prdocutname" href="product.html">Product Name Here</a>
                <div class="thumbnail">
                    <span class="new tooltip-test">New</span>
                    <a href="#"><img alt="" src="{!! asset('public/front/img/product1a.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="span3">
                <a class="prdocutname" href="product.html">Product Name Here</a>
                <div class="thumbnail">
                    <a href="#"><img alt="" src="{!! asset('public/front/img/product2a.jpg') !!}"></a>
                    <div class="pricetag">
                        <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                        <div class="price">
                            <div class="pricenew">$4459.00</div>
                            <div class="priceold">$5000.00</div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>

@endsection