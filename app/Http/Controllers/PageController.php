<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Auth;
use Session;
use Hash;

class PageController extends Controller
{
    public function getIndex(){
      $slide = Slide::all();
      // return view('page.trangchu', ['slide'=>$slide]);

      $new_product = Product::where('new', 1)->get();
      $sale_product = Product::where('promotion_price', '<>', 1)->get();
      return view('page.trangchu', compact('slide', 'new_product', 'sale_product'));
    }

    public function getLoaiSp($type){
      $sp_theo_loai = Product::where('id_type', $type)->paginate(6);
      $ten_loai = ProductType::where('id', $type)->value('name');
      return view('page.loai_san_pham', compact('sp_theo_loai', 'ten_loai'));
    }

    public function getChiTietSp(Request $req){
      $san_pham = Product::where('id', $req->id)->first();
      $id_loai = $san_pham->id_type;
      $ten_loai = ProductType::where('id', $id_loai)->value('name');
      return view('page.chi_tiet_sp', compact('san_pham', 'ten_loai'));
    }

    public function getThanhToan(){
      return view('page.thanh_toan');
    }

    public function getLienHe(){
      return view('page.lien_he');
    }

    public function getBlog(){
      return view('page.blog');
    }

    public function getAddCart(Request $req, $id){
      $product = Product::find($id);
      if(Session('cart'))
      $oldCart = Session::get('cart');
      else
      $oldCart = null;
      $cart = new Cart($oldCart);
      $cart->add($product, $id);
      $req->session()->put('cart',$cart);
      return redirect()->back();
    }

    public function getDeleteCart($id){
      if(Session('cart'))
      $oldCart = Session::get('cart');
      else
      $oldCart = null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

      if(count($cart->items) > 0){
        Session::put('cart',$cart);
      }
      else {
        Session::forget('cart');
      }
      return redirect()->back();
    }

    public function postDatHang(Request $req){
      $cart = Session::get('cart');
      $customer = new Customer;
      $customer->name = $req->name;
      $customer->gender = $req->gender;
      $customer->email = $req->email;
      $customer->address = $req->address;
      $customer->phone_number = $req->phone;
      $customer->note = $req->note;
      $customer->save();

      $bill = new Bill;
      $bill->id_customer = $customer->id;
      $bill->date_order = date('Y-m-d');
      $bill->total = $cart->totalPrice;
      $bill->payment = $req->payment;
      $bill->note = $req->note;
      $bill->save();

      foreach ($cart->items as $key => $value) {
        $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $key;
        $bill_detail->quantity = $value['qty'];
        $bill_detail->unit_price = ($value['price']/$value['qty']);
        $bill_detail->save();
      }
      Session::forget('cart');
      return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    public function getDatHang(){
      return view('page.dat_hang');
    }

    public function getDangNhap(){
      return view('page.dang_nhap');
    }

    public function getDangKi(){
      return view('page.dang_ki');
    }

    public function postDangKi(Request $req){
      $this->validate($req,
        [
          'email' => 'required|email|unique:users,email' ,
          'password' => ' required|min:6|max:20' ,
          'full_name' => 'required',
          're_password' => ' required|same:password'
        ],
        [
          'email.required' => 'Vui lòng nhập email' ,
          'email.email' => 'Không đúng định dạng' ,
          'email.unique' => 'Email đã được dùng',
          'password.required' => 'Vui lòng nhập mật khẩu',
          're_password.same' => 'Mậu khẩu không giống nhau',
          'password.min' => 'Mật khẩu có ít nhất 6 ký tự',
          'password.max' => 'Mật khẩu có nhiều nhất 12 ký tự',
          'full_name.required'  => 'Vui lòng nhập tên đầy đủ'
        ]);
        $user = new User();
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->adress;
        $user->save();

        return redirect()->back()->with('thongbao','Tạo tài khoản thành công');
    }

    public function postDangNhap(Request $req){
      $this->validate($req,
        [
          'email' => 'required|email' ,
          'password' => ' required' ,
        ],
        [
          'email.required' => 'Vui lòng nhập email' ,
          'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        $us = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($us)) {
          return redirect()->back()->with('thongbao','Đăng nhập thành công');
        }
        else {
          return redirect()->back()->with('thongbao','Đăng nhập thất bại');
        }
    }

    public function getDangXuat(){
      Auth::logout();
      return redirect()->route('trangchu');
    }

    public function getSearch(Request $req){
      $key = $req->key;
      $product = Product::where('name','like','%'.$key.'%')
                               ->orWhere('unit_price',$key)
                               ->get();
      return view('page.search',compact('product','key'));
    }


}
