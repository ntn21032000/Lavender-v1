<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class LoaiSanPhamController extends Controller
{
    public function getDanhSach()
    {
    	$loaisanpham = ProductType::all();
    	return view('admin.loaisanpham.danhsach',compact('loaisanpham'));
    }

    public function getSua($id)
    {
    	$loaisanpham = ProductType::find($id);
    	return view('admin.loaisanpham.sua',compact('loaisanpham'));
    }

    public function postSua(Request $request,$id)
    {
    	$this->validate($request,
	    	[
	    		'name' => 'required',
          'image' => 'required'
	    	],
	    	[
	    		'name.required'=>'Ban chua nhap ten loai san pham',
          'image.required'=>'Ban chua nhap link anh loai san pham',
	    	]
	    	);

        $loaisanpham = ProductType::find($id);
      	$loaisanpham->name = $request->name;
      	$loaisanpham->image = $request->image;
        $loaisanpham->id = $id;

    	  $loaisanpham->save();

    	return redirect('admin/loai-san-pham/sua/'.$id)->with('thongbao','Sua thanh cong');
    }



    public function getThem()
    {
    	return view('admin.loaisanpham.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
          [
            'name' => 'required',
            'image' => 'required'
          ],
          [
            'name.required'=>'Ban chua nhap ten loai san pham',
            'image.required'=>'Ban chua nhap link anh loai san pham',
          ]
	    	);

    	$loaisanpham = new ProductType;
    	$loaisanpham->name = $request->name;
    	$loaisanpham->image = $request->image;
      $loaisanpham->description = ' ';

    	$loaisanpham->save();

    	return redirect('admin/loai-san-pham/them')->with('thongbao','Them thanh cong');

    }

    public function getXoa($id)
    {
    	$loaisanpham = ProductType::find($id);
    	$loaisanpham->delete();

    	return redirect('admin/loai-san-pham/danh-sach')->with('thongbao','Xoa thanh cong');
    }
}
