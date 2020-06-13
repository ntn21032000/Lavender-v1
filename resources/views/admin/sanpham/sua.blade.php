@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">San pham
	                    <small>{{$sanpham->name}}</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <div class="col-lg-7" style="padding-bottom:120px">
	                @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/san-pham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Ten</label>
                            <input class="form-control" name="name" value="{{$sanpham->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Loai san pham</label>
                            <select class="form-control" name="id_type">
                                @foreach($loaisanpham as $lsp)
                                <option 
                                @if($sanpham->id_type == $lsp->id)
                                {{"selected"}}
                                @endif
                                value="{{$lsp->id}}">{{$lsp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mo ta chi tiet</label>
                            <textarea name="description" id="demo" class="form-control ckeditor">
                            	{{$sanpham->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Gia san pham</label>
                            <input class="form-control" name="unit_price" value="{{$sanpham->unit_price}}" />
                        </div>
                        <div class="form-group">
                            <label>Gia khuyen mai</label>
                            <input class="form-control" name="promotion_price" value="{{$sanpham->promotion_price}}" />
                        </div>
                        <div class="form-group">
                            <label>Hinh anh</label>
                            <div>
                            	<img width="110px" src="upload/tintuc/{{$sanpham->image}}" alt="">
                            </div>
                            <input type="file" class="form-control" name="image"/>
                        </div>
                        <div class="form-group">
                            <label>Hinh anh hover</label>
                            <div>
                            	<img width="110px" src="upload/tintuc/{{$sanpham->img_hover}}" alt="">
                            </div>
                            <input type="file" class="form-control" name="img_hover"/>
                        </div>
                        <div class="form-group">
                            <label>Don vi</label>
                            <input class="form-control" name="unit" value="{{$sanpham->unit}}" />
                        </div>
                        <div class="form-group">
                            <label>New</label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="0"
                                @if($sanpham->new == 0)
                                	{{"checked"}}
                                @endif
                                type="radio">Khong
                            </label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="1"
                                @if($sanpham->new == 1)
                                	{{"checked"}}
                                @endif
                                type="radio">Co
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Sua</button>
                        <button type="reset" class="btn btn-default">Lam moi</button>
                    <form>
	            </div>
	        </div>

@endsection
