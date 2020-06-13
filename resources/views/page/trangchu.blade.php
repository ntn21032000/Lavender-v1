@extends('master')
@section('content')
<!-- ##### Welcome Area Start ##### -->
@foreach($slide as $sl)
@if($sl->image == 'banner_chinh')
<section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/{{$sl->link}});">
  @endif
  @endforeach
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                    <h6>Lavender Flower Shop</h6>
                    <h2>LOVE GIFTS</h2>
                    <a target="_self" href="#" class="btn essence-btn">Click để đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Welcome Area End ##### -->

<!-- ##### Top Catagory Area Start ##### -->
<div class="top_catagory_area section-padding-80 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-4">
              @foreach($slide as $sl)
              @if($sl->image == 'banner_hoa_trang_tri')
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/{{$sl->link}});">
              @endif
              @endforeach
                    <div class="catagory-content">
                        <a target="_self" href="{{route('loaisanpham','1')}}">Hoa trang trí</a>
                    </div>
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-4">
              @foreach($slide as $sl)
              @if($sl->image == 'banner_hoa_gio')
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/{{$sl->link}});">
              @endif
              @endforeach
                    <div class="catagory-content">
                        <a target="_self" href="{{route('loaisanpham','2')}}">Hoa giỏ</a>
                    </div>
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-4">
              @foreach($slide as $sl)
              @if($sl->image == 'banner_hoa_bo')
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/{{$sl->link}});">
              @endif
              @endforeach
                    <div class="catagory-content">
                        <a target="_self" href="{{route('loaisanpham','3')}}">Hoa bó</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Top Catagory Area End ##### -->

<!-- ##### CTA Area Start ##### -->
<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
              @foreach($slide as $sl)
              @if($sl->image == 'banner_hot_sale')
                <div class="cta-content bg-img background-overlay" style="background-image: url(img/bg-img/{{$sl->link}});">
              @endif
              @endforeach
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="cta--text">
                            <h6>-50%</h6>
                            <h2>HOT SALE</h2>
                            <a target="_self" href="#" class="btn essence-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### CTA Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>HOA MỚI NHẤT</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                @foreach($new_product as $np)
                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="img/product-img/{{$np->image}}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="img/product-img/{{$np->img_hover}}" alt="">

                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                                <span>New</span>
                            </div>

                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a target="_self" href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>Hoa Mới</span>
                            <a target="_self" href="{{route('chitietsp',$np->id)}}">
                                <h6>{{$np->name}}</h6>
                            </a>
                            @if($np->promotion_price == 0)
                            <p class="product-price">{{number_format($np->unit_price)}} VNĐ</p>
                            @else
                            <p class="product-price"><span class="old-price">{{number_format($np->unit_price)}} VNĐ</span>{{number_format($np->promotion_price)}} VNĐ</p>
                            @endif

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a target="_self" href="{{route('addcart',$np->id)}}" class="btn essence-btn">Thêm vào giỏ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>HOA GIẢM GIÁ</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                  @foreach($sale_product as $sp)
                      @if($sp->promotion_price != 0)
                      <!-- Single Product -->
                      <div class="single-product-wrapper">
                          <!-- Product Image -->
                          <div class="product-img">
                              <img src="img/product-img/{{$sp->image}}" alt="">
                              <!-- Hover Thumb -->
                              <img class="hover-img" src="img/product-img/{{$sp->img_hover}}" alt="">

                              <!-- Product Badge -->
                              <div class="product-badge offer-badge">
                                  <span>Giảm giá</span>
                              </div>

                              <!-- Favourite -->
                              <div class="product-favourite">
                                  <a target="_self" href="#" class="favme fa fa-heart"></a>
                              </div>
                          </div>
                          <!-- Product Description -->
                          <div class="product-description">
                              <span>Hoa giảm giá</span>
                              <a target="_self" href="{{route('chitietsp',$sp->id)}}">
                                  <h6>{{$sp->name}}</h6>
                              </a>

                              <p class="product-price"><span class="old-price">{{number_format($sp->unit_price)}} VNĐ</span>{{number_format($sp->promotion_price)}} VNĐ</p>

                              <!-- Hover Content -->
                              <div class="hover-content">
                                  <!-- Add to Cart -->
                                  <div class="add-to-cart-btn">
                                      <a target="_self" href="{{route('addcart',$sp->id)}}" class="btn essence-btn">Thêm vào giỏ</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endif
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
              @foreach($slide as $sl)
              @if($sl->image == 'banner_best_seller')
                <div class="cta-content bg-img background-overlay" style="background-image: url(img/bg-img/{{$sl->link}});">
              @endif
              @endforeach
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="cta--text">
                            <h3>BEST SELLER</h3>
                            <a target="_self" href="#" class="btn essence-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ##### Brands Area Start ##### -->
<div class="brands-area d-flex align-items-center justify-content-between">
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand1.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand2.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand3.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand4.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand5.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand6.png" alt="">
    </div>
</div>
<!-- ##### Brands Area End ##### -->
@endsection
