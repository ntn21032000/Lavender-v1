@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">San pham
                            <small>Them</small>
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
                        <form action="admin/san-pham/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Ten san pham</label>
                                <input class="form-control" name="name" placeholder="Ten san pham" />
                            </div>
                            <div class="form-group">
                                <label>Loai san pham</label>
                                <select class="form-control" name="id_type">
                                    @foreach($loaisanpham as $lsp)
                                    <option value="{{$lsp->id}}">{{$lsp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mo ta chi tiet</label>
                                <textarea name="description" class="form-control ckeditor"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gia san pham</label>
                                <input class="form-control" name="unit_price" placeholder="Gia san pham" />
                            </div>
                            <div class="form-group">
                                <label>Gia khuyen mai</label>
                                <input class="form-control" name="promotion_price" placeholder="Gia khuyen mai" />
                            </div>
                            <div class="form-group">
                                <label>hinh anh</label>
                                <input type="file" class="form-control" name="image"/>
                            </div>
                            <div class="form-group">
                                <label>hinh anh hover</label>
                                <input type="file" class="form-control" name="img_hover"/>
                            </div>
                            <div class="form-group">
                                <label>Don vi</label>
                                <input class="form-control" name="unit" placeholder="Don vi" />
                            </div>
                            <div class="form-group">
                                <label>Moi</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">Khong
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio">Co
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Them</button>
                            <button type="reset" class="btn btn-default">Lam moi</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
