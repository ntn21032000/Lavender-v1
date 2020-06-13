<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class AdminController extends Controller
{
  public function getDangNhapAdmin()
  {
      return view('admin.login');
  }

  public function postDangNhapAdmin(Request $request)
  {
      $this->validate($request,[
          'email'=>'required',
          'password'=>'required|min:5|max:10'
      ],[
          'email.required'=>'Ban chua nhap email',
          'password.required'=>'ban chua nhap password',
          'password.min'=>'Password phai nhieu hon 5 ky tu',
          'password.max'=>'Password phai it hon 10 ky tu'
      ]);

      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
      {
          return redirect('admin/loai-san-pham/danh-sach');
      }
      else
      {
          return redirect('admin/dang-nhap')->with('thongbao','Dang nhap khong thanh cong');
      }
  }

  public function getDangxuatAdmin()
  {
      Auth::logout();
      return redirect('admin/dang-nhap');
  }

}
