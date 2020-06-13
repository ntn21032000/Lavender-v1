@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $u)
                        <tr class="odd gradeX" align="center">
                            <td>{{$u->id}}</td>
                            <td>{{$u->full_name}}</td>
                            <td>{{$u->email}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{$u->id}}">Xoa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$u->id}}">Sua</a></td>
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
