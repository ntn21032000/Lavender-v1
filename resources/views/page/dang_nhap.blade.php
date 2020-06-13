@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Trang chủ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a target="_self" href="{{route('dangki')}}">Đăng Kí</a>
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

			<form action="{{route('dangnhap')}}" target="_self" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>


						<div class="form-block">
							<label for="email">Đại chỉ email*</label>
							<input name="email" type="email" class="form-control" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu*</label>
							<input name="password" class="form-control" type="text" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn essence-btn">Đăng nhập</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
