@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tuc
                        <small>Danh sach</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Ten san pham</th>
                            <th>Id loai san pham</th>
                            <th>Mo ta chi tiet</th>
                            <th>Gia san pham</th>
                            <th>Gia khuyen mai</th>
                            <th>Link anh</th>
                            <th>Link anh hover</th>
                            <th>Don vi</th>
                            <th>New</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanpham as $sp)
                            <tr class="odd gradeX" align="center">
                                <td>{{$sp->id}}</td>
                                <td>
                                  <p>{{$sp->name}}</p>
                                </td>
                                <td>{{$sp->id_type}}<br>{{$sp->product_type->name}}</td>
                                <td>{{$sp->description}}</td>
                                <td>{{$sp->unit_price}}</td>
                                <td>{{$sp->promotion_price}}</td>
                                <td>
                                  <div style="width: 110px;height: 80px">
                                      <img style="object-fit: cover;" width="100%" height="100%" src="img/product-img/{{$sp->image}}" alt="">
                                  </div>
                                </td>
                                <td>
                                  <div style="width: 110px;height: 80px">
                                      <img style="object-fit: cover;" width="100%" height="100%" src="img/product-img/{{$sp->img_hover}}" alt="">
                                  </div>
                                </td>
                                <td>{{$sp->unit}}</td>
                                <td>
                                    @if($sp->new == 0)
                                    {{'Co'}}
                                    @else
                                    {{'Khong'}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/san-pham/xoa/{{$sp->id}}">Xoa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/san-pham/sua/{{$sp->id}}">Sua</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
