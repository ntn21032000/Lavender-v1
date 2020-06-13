<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;

class SanPhamController extends Controller
{
    public function getDanhSach()
    {
    	$sanpham = Product::orderBy('id','DESC')->get();
    	return view('admin.sanpham.danhsach',compact('sanpham'));
    }

    public function getSua($id)
    {
        $sanpham = Product::find($id);
        $loaisanpham = ProductType::all();
        return view('admin.sanpham.sua',compact('sanpham','loaisanpham'));
    }

    public function postSua(Request $request,$id)
    {
        $sanpham = Product::find($id);

        $this->validate($request,[
          'name'=>'required',
      		'id_type'=>'required',
      		'description'=>'required',
      		'unit_price'=>'required',
          'promotion_price'=>'required',
          'unit'=>'required'
      		],[
      		'name.required'=>'Ban chua nhap Ten san pham',
          'id_type.required'=>'Ban chua chon loai san pham',
          'description.required'=>'Ban chua nhap mo ta',
          'unit_price.required'=>'Ban chua nhap gia san pham',
          'promotion_price.required'=>'Ban chua nhap gia khuyen mai',
          'unit.required'=>'Ban chua nhap don vi'
      		]);

          	$sanpham->name = $request->name;
          	$sanpham->id_type = $request->id_type;
            $description = strip_tags($request->description, 'p');
          	$sanpham->description = $description;
          	$sanpham->unit_price = $request->unit_price;
          	$sanpham->promotion_price = $request->promotion_price;
            $sanpham->unit = $request->unit;
            $sanpham->new = $request->new;

        if($request->hasFile('image'))
      	{
      		$file = $request->file('image');

      		$duoi = $file->getClientOriginalExtension();
      		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
      		{
      			return redirect('admin/san-pham/them')->with('thongbao','chi duoc chon anh co duoi duoi .jpg .png .jpeg');
      		}

      		$name = $file->getClientOriginalName();
      		$image = str_random(4)."_".$name;
      		while(file_exists("img/product-img".$image))
      		{
      			$image = str_random(4)."_".$name;
      		}
          unlink("img/product-img/".$sanpham->image);
      		$file->move("img/product-img",$image);

          $sanpham->image = $image;
      	}
      	else
      	{
          $sanpham->image = "";
      	}

        if($request->hasFile('img_hover'))
        {
          $file = $request->file('img_hover');

          $duoi = $file->getClientOriginalExtension();
          if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
          {
            return redirect('admin/san-pham/them')->with('thongbao','chi duoc chon anh co duoi duoi .jpg .png .jpeg');
          }

          $name = $file->getClientOriginalName();
          $img_hover = str_random(4)."_".$name;
          while(file_exists("img/product-img".$img_hover))
          {
            $img_hover = str_random(4)."_".$name;
          }
          $file->move("img/product-img",$img_hover);

          $sanpham->img_hover = $img_hover;
        }
        else
        {
          $sanpham->img_hover = "";
        }

        $sanpham->save();

        return redirect('admin/san-pham/sua/'.$id)->with('thongbao','Sua thanh cong');
    }



    public function getThem()
    {
        $loaisanpham = ProductType::all();
    	  return view('admin.sanpham.them',compact('loaisanpham'));
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'id_type'=>'required',
    		'description'=>'required',
    		'unit_price'=>'required',
        'promotion_price'=>'required',
        'unit'=>'required'
    		],[
    		'name.required'=>'Ban chua nhap Ten san pham',
        'id_type.required'=>'Ban chua chon loai san pham',
        'description.required'=>'Ban chua nhap mo ta',
        'unit_price.required'=>'Ban chua nhap gia san pham',
        'promotion_price.required'=>'Ban chua nhap gia khuyen mai',
        'unit.required'=>'Ban chua nhap don vi'
    		]);

    	$sanpham = new Product;

    	$sanpham->name = $request->name;
    	$sanpham->id_type = $request->id_type;
      $description = strip_tags($request->description, 'p');
    	$sanpham->description = $description;
    	$sanpham->unit_price = $request->unit_price;
    	$sanpham->promotion_price = $request->promotion_price;
      $sanpham->unit = $request->unit;
      $sanpham->new = $request->new;

    	if($request->hasFile('image'))
    	{
    		$file = $request->file('image');

    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
    		{
    			return redirect('admin/san-pham/them')->with('thongbao','chi duoc chon anh co duoi duoi .jpg .png .jpeg');
    		}

    		$name = $file->getClientOriginalName();
    		$image = str_random(4)."_".$name;
    		while(file_exists("img/product-img".$image))
    		{
    			$image = str_random(4)."_".$name;
    		}
    		$file->move("img/product-img",$image);

        $sanpham->image = $image;
    	}
    	else
    	{
        $sanpham->image = "";
    	}

      if($request->hasFile('img_hover'))
      {
        $file = $request->file('img_hover');

        $duoi = $file->getClientOriginalExtension();
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
        {
          return redirect('admin/san-pham/them')->with('thongbao','chi duoc chon anh co duoi duoi .jpg .png .jpeg');
        }

        $name = $file->getClientOriginalName();
        $img_hover = str_random(4)."_".$name;
        while(file_exists("img/product-img".$img_hover))
        {
          $img_hover = str_random(4)."_".$name;
        }
        $file->move("img/product-img",$img_hover);

        $sanpham->img_hover = $img_hover;
      }
      else
      {
        $sanpham->img_hover = "";
      }

    	$sanpham->save();

    	return redirect('admin/san-pham/them')->with('thongbao','Them thanh cong');
    }

    public function getXoa($id)
    {
    	$sanpham = Product::find($id);
    	$sanpham->delete();

    	return redirect('admin/san-pham/danh-sach')->with('thongbao','Xoa thanh cong');
    }
}
