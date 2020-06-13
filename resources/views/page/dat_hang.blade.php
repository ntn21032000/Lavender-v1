@extends('master')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Lavender Shop</h2>
                    @if(Session::has('thongbao'))
                    <h2>{{Session::get('thongbao')}}</h2>
                    @else
                    <h2>Thanh toán</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Hóa Đơn</h5>
                    </div>

                    <form target="_self" action="{{route('dathang')}}" method="post">                        <div class="row">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="col-md-6 mb-3">
                                <label for="name">Tên <span>*</span></label>
                                <input type="text" class="form-control" name="name" value="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="gender">Giới tính <span>*</span></label>
                                <select class="w-100" name="gender">
                                    <option value="khac">Khác</option>
                                    <option value="nam">Nam</option>
                                    <option value="nu">Nữ</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" class="form-control" name="email" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="address">Địa chỉ <span>*</span></label>
                                <input type="text" class="form-control mb-3" name="address" value="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone_number">Số điện thoại <span>*</span></label>
                                <input type="number" class="form-control" name="phone" min="0" value="">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="payment">Hình thức thanh toán <span>*</span></label>
                                <select class="w-100" name="payment">
                                    <option value="ATM">ATM</option>
                                    <option value="COD">COD</option>
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="note">Ghi chú <span></span></label>
                                <input class="form-control" name="note" value="Không">
                            </div>
                        </div>
                        <button type="submit" class="btn essence-btn" name="button">Đặt hàng</button>
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Đặt hàng của bạn</h5>
                        <p>Chi tiết</p>
                    </div>

                    <ul class="order-details-form mb-4">
                        <li><span>Sản phẩm</span> <span>Tổng cộng</span></li>
                        @if(Session::has('cart'))
                        @foreach($product_cart as $cart)
                        <li>
                          <span>{{$cart['item']['name']}} x{{$cart['qty']}}</span>
                          <span>{{number_format($cart['price'])}} VNĐ</span>
                        </li>
                        @endforeach
                        @endif
                        <li><span>Tổng cộng</span> <span>
                          @if(Session::has('cart'))
                          {{number_format($totalPrice)}}
                          @else
                          0
                          @endif
                          VNĐ
                        </span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Checkout Area End ##### -->
@endsection
