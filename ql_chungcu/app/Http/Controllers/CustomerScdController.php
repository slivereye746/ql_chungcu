<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Customer;
use App\Models\Customer_Scd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerScdController extends Controller
{
    //
    public function add($id)
    {
        $apartment_id = $id;
        return view('apartment_add_customer', compact('apartment_id'));
    }
    public function addconfirm(Request $request)
    {
        $messages = [
            'name.required'=>'Vui lòng nhập tên khách hàng!',
            'cmnd.required'=>'Vui lòng nhập số CMND!',
            'birthday.required'=>'Vui lòng nhập ngày sinh khách hàng!',
            'phone.required'=>'Vui lòng nhập số liên lạc của khách hàng!',
            'phone.min' => 'Số điện thoại có từ 9 - 13 số!',
            'phone.max' => 'Số điện thoại có từ 9 - 13 số!',
            //'img.mimes' => 'Lỗi hình ảnh! Thử lại với file: jpeg,bmp,png.'
        ];
        $validated = $request->validate([
            'name' => 'required',
            'cmnd' => 'required',
            'birthday'=> 'required',
            'phone'=> 'required|min:9|max:13',
            //'img' => 'image|file'
        ], $messages);

        $customers = new Customer_Scd;
        $customers->name = $request->name;
        $customers->cmnd = $request->cmnd;
        $customers->birthday = $request->birthday;
        $customers->phone = $request->phone;
        $customers->apartment_id = $request->apartment_id;
        $customers->email = $request->email;
        $customers->save();

        $customer = DB::table('customer_scd')->latest('id')->first();
        return redirect()->route('apartment', ['id' => $request->apartment_id]);
    }

    public function delete(Request $request)
    {
        $customer = DB::table('customer_scd')->where('id', $request->id)->delete();
        $apartment = Apartment::where("id",$request->apartment_id)->first();
        $customer = Customer_Scd::where("apartment_id",$request->apartment_id)->get();
        $owner = Customer::where("id",$apartment->customer_id)->first();
        return view("apartment_detail", compact('apartment','customer', 'owner'));
    }
}
