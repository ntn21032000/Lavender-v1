@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->full_name}}</small>
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
                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Ho ten</label>
                                <input class="form-control" name="full_name" value="{{$user->full_name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changePassword" name="changePassword">
                                <label>Doi Password</label>
                                <input type="password" class="form-control password" name="password" placeholder="Doi Password" disabled/>
                            </div>
                            <div class="form-group">
                                <label>Nhap lai Password</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="Nhap lai Password" disabled/>
                            </div>
                            <button type="submit" class="btn btn-default">Sua</button>
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

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function() {
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password".attr('disabled',''));
                }
            });
        });
    </script>
@endsection
