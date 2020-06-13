@extends('master')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Tìm kiếm : '{{$key}}'</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Cửa Hàng</h6>

                        <!--  Catagories  -->
                        <div class="catagories-menu">
                            <ul id="menu-content2" class="menu-content collapse show">
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#clothing">
                                    <ul class="sub-menu collapse show" id="clothing">
                                        <li><a target="_self" href="{{route('loaisanpham','1')}}">Hoa Trang Trí</a></li>
                                    </ul>
                                </li>
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                    <ul class="sub-menu collapse show" id="shoes">
                                        <li><a target="_self" href="{{route('loaisanpham','2')}}">Hoa Giỏ</a></li>
                                    </ul>
                                </li>
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                    <ul class="sub-menu collapse show" id="accessories">
                                        <li><a target="_self" href="{{route('loaisanpham','3')}}">Hoa Bó</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget price mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Lọc theo</h6>
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Giá</p>

                        <div class="widget-desc">
                            <div class="slider-range">
                                <div data-min="49" data-max="360" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="49" data-value-max="360" data-label-result="Range:">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                                <div class="range-price">Khoảng: $49.00 - $360.00</div>
                            </div>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget color mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Màu</p>
                        <div class="widget-desc">
                            <ul class="d-flex">
                                <li><a target="_self" href="#" class="color1"></a></li>
                                <li><a target="_self" href="#" class="color2"></a></li>
                                <li><a target="_self" href="#" class="color3"></a></li>
                                <li><a target="_self" href="#" class="color4"></a></li>
                                <li><a target="_self" href="#" class="color5"></a></li>
                                <li><a target="_self" href="#" class="color6"></a></li>
                                <li><a target="_self" href="#" class="color7"></a></li>
                                <li><a target="_self" href="#" class="color8"></a></li>
                                <li><a target="_self" href="#" class="color9"></a></li>
                                <li><a target="_self" href="#" class="color10"></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget brands mb-50">
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                    <p><span>{{count($product)}}</span>Sản Phẩm</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                      @foreach($product as $sptl)
                        <!-- Single Product -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="img/product-img/{{$sptl->image}}" alt="">
                                    <!-- Hover Thumb -->
                                    <img class="hover-img" src="img/product-img/{{$sptl->img_hover}}" alt="">

                                    <!-- Product Badge -->
                                    @if($sptl->promotion_price != 0)
                                    <div class="product-badge offer-badge">
                                        <span>Giảm giá</span>
                                    </div>
                                    @elseif($sptl->new == 1)
                                    <div class="product-badge new-badge">
                                        <span>New</span>
                                    </div>
                                    @endif
                                    <!-- Favourite -->
                                    <div class="product-favourite">
                                        <a target="_self" href="#" class="favme fa fa-heart"></a>
                                    </div>
                                </div>

                                <!-- Product Description -->
                                <div class="product-description">
                                    <span>{{$sptl->unit}}</span>
                                    <a target="_self" href="{{route('chitietsp',$sptl->id)}}">
                                        <h6>{{$sptl->name}}</h6>
                                    </a>
                                    @if($sptl->promotion_price == 0)
                                    <p class="product-price">{{number_format($sptl->unit_price)}} VNĐ</p>
                                    @else
                                    <p class="product-price"><span class="old-price">{{number_format($sptl->unit_price)}} VNĐ</span>{{number_format($sptl->promotion_price)}} VNĐ</p>
                                    @endif

                                    <!-- Hover Content -->
                                    <div class="hover-content">
                                        <!-- Add to Cart -->
                                        <div class="add-to-cart-btn">
                                            <a target="_self" href="{{route('addcart',$sptl->id)}}" class="btn essence-btn">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection
