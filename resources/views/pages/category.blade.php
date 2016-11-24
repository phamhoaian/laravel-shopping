@extends('master')

@section('content')
<section id="product">
    <div class="container">
        <!--  breadcrumb -->
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
                <span class="divider">/</span>
            </li>
            <li class="active">Category</li>
        </ul>
        <div class="row">
            <!-- Sidebar Start-->
            <aside class="span3">
                <!-- Category-->
                <div class="sidewidt">
                    <h2 class="heading2"><span>Categories</span></h2>
                    <ul class="nav nav-list categories">
                    	@foreach($menu_cate as $cate)
                        <li>
                            <a href="{{ route('category', [$cate->id, $cate->alias]) }}">{!! $cate->name !!}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!--  Best Seller -->
                <div class="sidewidt">
                    <h2 class="heading2"><span>Best Seller</span></h2>
                    <ul class="bestseller">
                    @foreach($best_seller as $item)
                        <li>
                            <img width="50" height="50" src="{{ asset('resources/upload/'.$item->image) }}" alt="product" title="product">
                            <a class="productname" href="{{ url('product', [$item->id, $item->alias]) }}"> {!! $item->name !!}</a>
                            <span class="procategory">{!! $item->cate->name !!}</span>
                            <span class="price">{!! number_format($item->price) !!}</span>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <!-- Latest Product -->
                <div class="sidewidt">
                    <h2 class="heading2"><span>Latest Products</span></h2>
                    <ul class="bestseller">
                    @foreach($latest_product as $item)
                        <li>
                            <img width="50" height="50" src="{{ asset('resources/upload/'.$item->image) }}" alt="product" title="product">
                            <a class="productname" href="{{ url('product', [$item->id, $item->alias]) }}"> {!! $item->name !!}</a>
                            <span class="procategory">{!! $item->cate->name !!}</span>
                            <span class="price">{!! number_format($item->price) !!}</span>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <!--  Must have -->
                <div class="sidewidt">
                    <h2 class="heading2"><span>Must have</span></h2>
                    <div class="flexslider" id="mainslider">
                        <ul class="slides">
                            <li>
                                <img src="img/product1.jpg" alt="" />
                            </li>
                            <li>
                                <img src="img/product2.jpg" alt="" />
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- Sidebar End-->
            <!-- Category-->
            <div class="span9">
                <!-- Category Products-->
                <section id="category">
                    <div class="row">
                        <div class="span9">
                            <!-- Category-->
                            <section id="categorygrid">
                                <ul class="thumbnails grid">
                                @foreach($product as $item)
                                    <li class="span3">
                                        <a class="prdocutname" href="product.html">{!! $item->name !!}</a>
                                        <div class="thumbnail">
                                            <span class="sale tooltip-test">Sale</span>
                                            <a href="{{ url('product', [$item->id, $item->alias]) }}"><img alt="" src="{{ asset('resources/upload/'.$item->image) }}"></a>
                                            <div class="pricetag">
                                                <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                                                <div class="price">
                                                    <div class="pricenew">{!! number_format($item->price) !!} VNĐ</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                                <div class="pagination pull-right">
                                    <ul>
                                        @if($product->currentPage() != 1)
                                        <li><a href="{!! str_replace('/?', '?', $product->url($product->currentPage() - 1)) !!}">Prev</a>
                                        </li>
                                        @endif
                                        @for($i = 1; $i <= $product->lastPage(); $i++)
                                        <li class="{!! $product->currentPage() == $i ? 'active' : '' !!}">
                                            <a href="{!! str_replace('/?', '?', $product->url($i)) !!}">{!! $i !!}</a>
                                        </li>
                                        @endfor
                                        @if($product->currentPage() != $product->lastPage())
                                        <li><a href="{!! str_replace('/?', '?', $product->url($product->currentPage() + 1)) !!}">Next</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection