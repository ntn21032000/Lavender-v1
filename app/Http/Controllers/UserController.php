<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
        public function getDanhSach()
    {
    	$user = User::all();
    	return view('admin.user.danhsach',compact('user'));
    }

    public function getSua($id)
    {
    	$user = User::find($id);
    	return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,[
                'full_name'=>'required|min:3'
            ],[
                'full_name.required'=>'Ban chua nhap ten nguoi dung',
                'full_name.min'=>'Ten nguoi dung phai co it nhat 3 ki tu'

            ]);

        $user = User::find($id);

        $user->full_name = $request->full_name;

        if($request->changePassword == "on")
        {
            $this->validate($request,[
                'password'=>'required|min:5|max:10',
                'passwordAgain'=>'required|same:password'
            ],[
                'password.required'=>'Ban chua nhap mk',
                'password.min'=>'Mk phai co it nhat 3 ky tu',
                'password.max'=>'Mk khong qua 10 ky tu',
                'passwordAgain.required'=>'Ban chua nhap lai mk',
                'passwordAgain.same'=>'Mk nhap lai chua dung'

            ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('admin/user/sua/'.$id)->with('thongbao','Sua user thanh cong');
    }



    public function getThem()
    {
        return view('admin.user.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,[
	    		'full_name'=>'required|min:3',
	    		'email'=>'required|email|unique:users,email',
	    		'password'=>'required|min:5|max:10',
	    		'passwordAgain'=>'required|same:password'
	    	],[
	    		'full_name.required'=>'Ban chua nhap ten nguoi dung',
	    		'full_name.min'=>'Ten nguoi dung phai co it nhat 3 ki tu',

	    		'email.required'=>'Ban chua nhap email',
	    		'email.email'=>'Ban chua nhap dung dinh dang email',
	    		'email.unique'=>'Email da ton tai',

	    		'password.required'=>'Ban chua nhap mk',
	    		'password.min'=>'Mk phai co it nhat 3 ky tu',
	    		'password.max'=>'Mk khong qua 10 ky tu',
	    		'passwordAgain.required'=>'Ban chua nhap lai mk',
	    		'passwordAgain.same'=>'Mk nhap lai chua dung'

	    	]);

    	$user = new User();

    	$user->full_name = $request->full_name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);

    	$user->save();

    	return redirect('admin/user/them')->with('thongbao','Them user thanh cong');
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danh-sach')->with('thongbao','Xoa user thanh cong');
    }

}
