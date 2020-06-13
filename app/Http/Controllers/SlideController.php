<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slide;

class SlideController extends Controller
{
    public function getDanhSach()
    {
        $slide = Slide::all();
        return view('admin.slide.danhsach',compact('slide'));
    }

    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.sua',compact('slide'));
    }

    public function postSua(Request $request,$id)
    {
        $slide = Slide::find($id);

        if($request->hasFile('link'))
        {
            $file = $request->file('link');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/them')->with('thongbao','chi duoc chon duoi .jpg .png .jpeg');
            }

            $name = $file->getClientOriginalName();
            $link = str_random(4)."_".$name;
            while(file_exists("img/bg-img".$link))
            {
                $link = str_random(4)."_".$name;
            }
            unlink("img/bg-img/".$slide->link);
            $file->move("img/bg-img",$link);
            $slide->link = $link;
        }
        else
        {
            $slide->link = "";
        }

        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sua slide thann cong');

    }



    // public function getThem()
    // {
    //     return view('admin.slide.them');
    // }
    //
    // public function postThem(Request $request)
    // {
    //     $this->validate($request,[
    //             'image'=>'required',
    //         ],[
    //             'image.required'=>'Ban chua nhap ten'
    //         ]);
    //
    //     $slide = new Slide();
    //     $slide->image = $request->image;
    //
    //     if($request->hasFile('link'))
    //     {
    //         $file = $request->file('link');
    //
    //         $duoi = $file->getClientOriginalExtension();
    //         if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
    //         {
    //             return redirect('admin/slide/them')->with('thongbao','chi duoc chon duoi .jpg .png .jpeg');
    //         }
    //
    //         $name = $file->getClientOriginalName();
    //         $link = str_random(4)."_".$name;
    //         while(file_exists("img/bg-img".$link))
    //         {
    //             $link = str_random(4)."_".$name;
    //         }
    //         $file->move("img/bg-img",$link);
    //         $slide->link = $link;
    //     }
    //     else
    //     {
    //         $slide->link = "";
    //     }
    //
    //     $slide->save();
    //     return redirect('admin/slide/them')->with('thongbao','Them slide thann cong');
    //
    // }
    //
    // public function getXoa($id)
    // {
    //     $slide = Slide::find($id);
    //     $slide->delete();
    //     return redirect('admin/slide/danh-sach')->with('thongbao','Xoa slide thanh cong');
    // }
}
