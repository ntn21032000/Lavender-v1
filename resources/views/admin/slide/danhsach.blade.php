@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Danh sach</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                @endif
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Hinh</th>
                            <th>Ten</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($slide as $sd)
                        <tr class="even gradeC" align="center">
                            <td>{{$sd->id}}</td>
                            <td>
                                <img width="400px" src="img/bg-img/{{$sd->link}}">
                            </td>
                            <td>{{$sd->image}}</td>
                            <!-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <a href="admin/slide/xoa/{{$sd->id}}">Xoa</a>
                            </td> -->
                            <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                <a href="admin/slide/sua/{{$sd->id}}">Sua</a>
                            </td>
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
