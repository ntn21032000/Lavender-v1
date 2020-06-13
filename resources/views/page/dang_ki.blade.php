@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Trang chủ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a target="_self" href="{{route('dangnhap')}}">Đăng nhập</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
  @if(Session::has('thongbao'))
  <h2>{{Session::get('thongbao')}}</h2>
  @endif
  @if(count($errors)>0)
  @foreach($errors->all() as $err)
  {{$err}}
  @endforeach
  @endif
	<div class="container">
		<div id="content">

			<form action="{{route('dangki')}}" target="_self" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>


						<div class="form-block">
							<label for="email">Địa chỉ Email*</label>
							<input type="email" name="email" class="form-control" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Tên*</label>
							<input name="full_name" type="text" class="form-control" required>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input name="address" type="text" class="form-control" value="Street Address" required>
						</div>


						<div class="form-block">
							<label for="phone">Số điện thoại*</label>
							<input name="phone" type="text" class="form-control" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu*</label>
							<input name="password" type="password" class="form-control" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu*</label>
							<input name="re_password" type="password" class="form-control" required>
						</div>
						<div class="form-block">
							<button class="btn essence-btn" type="submit">Đăng kí</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
