<!-- ##### Header Area Start ##### -->
<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a target="_self" class="nav-brand" href="{{route('trangchu')}}"><img src="img/core-img/lavenderfl.png" alt=""></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu" >
                <!-- close btn -->
                <div class="classycloseIcon" >
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav" >
                    <ul>
                        <li><a target="_self" href="#">Cửa Hàng</a>
                            <div class="megamenu" style="background-image: url(img/bg-img/chm.jpg);">
                              @foreach($loai_sp as $lsp)
                                <ul class="single-mega cn-col-4" >
                                    <li><a target="_self" href="{{route('loaisanpham',$lsp->id)}}">{{$lsp->name}}</a></li>
                                </ul>
                              @endforeach
                                  <div class="single-mega cn-col-4">
                                    <img src="img/bg-img/chm.png" alt="">
                                </div>
                            </div>
                        </li>
                        <li><a target="_self" href="#">Trang</a>
                            <ul class="dropdown">
                                <li><a target="_self" href="{{route('trangchu')}}">Trang Chủ</a></li>
                                <li><a target="_self" href="{{route('loaisanpham','0')}}">Cửa Hàng</a></li>
                                <li><a target="_self" href="{{route('thanhtoan')}}">Thanh Toán</a></li>
                                <li><a target="_self" href="{{route('blog')}}">Blog</a></li>
                                <li><a target="_self" href="{{route('lienhe')}}">Liên Hệ</a></li>
                            </ul>
                        </li>
                        <li><a target="_self" href="{{route('blog')}}">Blog</a></li>
                        <li><a target="_self" href="{{route('lienhe')}}">Liên Hệ</a></li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
                <form target="_self" action="{{route('search')}}" method="get">
                    <input type="search" name="key" id="headerSearch" placeholder="Type for search">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- Favourite Area -->
            <!-- <div class="favourite-area">
                <a target="_self" href="#"><img src="img/core-img/heart.svg" alt=""></a>
            </div> -->
            <!-- User Login Info -->
            @if(Auth::check())
            <div class="user-login-info">
                <a target="_self" href="#">{{Auth::user()->full_name}}</a>
            </div>
            <div class="user-login-info">
                <a target="_self" href="{{route('dangxuat')}}">Đăng xuất</a>
            </div>
            @else
            <div class="user-login-info">
                <a target="_self" href="{{route('dangnhap')}}">Đăng nhập</a>
            </div>
            <div class="user-login-info">
                <a target="_self" href="{{route('dangki')}}">Đăng kí</a>
            </div>
            @endif
            <!-- Cart Area -->
            <div class="cart-area">
                <a target="_self" href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt="">
                  <span>
                    @if(Session::has('cart'))
                    {{Session('cart')->totalQty}}
                    @else
                    0
                    @endif
                  </span>
                </a>
            </div>
        </div>

    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a target="_self" href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt="">
          <span>
            @if(Session::has('cart'))
            {{Session('cart')->totalQty}}
            @else
            0
            @endif
          </span>
        </a>
    </div>

    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
          @if(Session::has('cart'))
            @foreach($product_cart as $product)
            <!-- Single Cart Item -->
            <div class="single-cart-item">
              <a target="_self" href="{{route('deletecart',$product['item']['id'])}}"><span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span></a>
                <a target="_self" href="#" class="product-image">
                    <img src="img/product-img/{{$product['item']['image']}}" class="cart-thumb" alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                        <span class="badge">Flower Shop</span>
                        <h6>{{$product['item']['name']}}</h6>
                        <p class="size">Số lượng: {{$product['qty']}}</p>
                        @if($product['item']['promotion_price'] == 0)
                        <p class="price">{{$product['qty']}} x {{number_format($product['item']['unit_price'])}} VNĐ</p>
                        @else
                        <p class="price">{{$product['qty']}} x {{number_format($product['item']['promotion_price'])}} VNĐ</p>
                        @endif
                    </div>
                </a>
            </div>
            @endforeach
          @endif
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">

            <h2>Tổng tiền</h2>
            <ul class="summary-table">
                <li><span>Tổng tiền : </span>
                  <span>
                    @if(Session::has('cart'))
                    {{number_format(Session('cart')->totalPrice)}} VNĐ
                    @else
                    0 VNĐ
                    @endif
                  </span>
                </li>
                <li><span>Delivery : </span> <span>Miễn phí</span></li>
            </ul>
            <div class="checkout-btn mt-100">
                <a target="_self" href="{{route('thanhtoan')}}" class="btn essence-btn">Thanh toán</a>
            </div>
        </div>
    </div>
</div>
<!-- ##### Right Side Cart End ##### -->
