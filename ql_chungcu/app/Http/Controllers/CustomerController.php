<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Customer;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function index()
    {
        # code...
        $customers = Customer::all();
        return view('customers', compact('customers'));
    }

    public static function getCustomer($id)
    {
        $customer = Customer::where("id",$id)->first();
        return view("customer_detail", compact('customer'));
    }

    public function findCustomerName($id)
    {
        # code...
        $name = Customer::where("id",$id)->first();
        return $name;
    }

    public function getListApartment($id)
    {
        # code...
        $listApart = Apartment::where('customer_id', '=', $id)->get();
        return $listApart;
    }

    public function add()
    {
        $apartment = DB::table('apartments')->where('customer_id', '=', NULL)->get();
        return view('customer_add', compact('apartment'));
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
            'phone.unique' => 'Số điện thoại đã được dùng!',
            'email.unique' => 'Email đã được dùng!',
            //'img.mimes' => 'Lỗi hình ảnh! Thử lại với file: jpeg,bmp,png.'
        ];
        $validated = $request->validate([
            'name' => 'required',
            'cmnd' => 'required|unique:customers,cmnd',
            'birthday'=> 'required',
            'phone'=> 'required|min:9|max:13|unique:customers,phone',
            'email' => 'unique:customers,email',
            //'img' => 'image|file'
        ], $messages);

        $customers = new Customer;
        $customers->name = $request->name;
        $customers->cmnd = $request->cmnd;
        $customers->birthday = $request->birthday;
        $customers->phone = $request->phone;
        $customers->email = $request->email;
        $customers->save();

        $customer = DB::table('customers')->latest('id')->first();
        
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $storedPath = $image->move('images/user_profile', $customer->id.'.png');
        }

        $apartment = DB::table('apartments')
                        ->where('id',$request->apartment)
                        ->update(['customer_id' => $customer->id]);

        return redirect()->action('CustomerController@index');
    }

    public function edit($id)
    {
        # code...
        $customer = Customer::where("id",$id)->first();
        $emptyapartment = DB::table('apartments')->where('customer_id', '=', NULL)->get();
        return view("customer_edit", compact('customer','emptyapartment'));
    }

    public function update(Request $request)
    {
        $messages = [
            'name.required'=>'Vui lòng nhập tên khách hàng!',
            'birthday.required'=>'Vui lòng nhập ngày sinh khách hàng!',
            'phone.required'=>'Vui lòng nhập số liên lạc của khách hàng!',
            'phone.min' => 'Số điện thoại có từ 9 - 13 số!',
            'phone.max' => 'Số điện thoại có từ 9 - 13 số!',
            'phone.unique' => 'Số điện thoại đã được dùng!',
            'email.unique' => 'Email đã được dùng!',
        ];
        $validated = $request->validate([
            'name' => 'required',
            'birthday'=> 'required',
            'phone'=> 'required|min:9|max:13|unique:customers,phone,'.$request->id,
            'email' => 'unique:customers,email,'.$request->id,
        ], $messages);
        # code...
        $apartment = DB::table('customers')
                        ->where('id',$request->id)
                        ->update([
                            'name' => $request->name, 
                            'phone' => $request->phone, 
                            'email' => $request->email,
                            'birthday' => $request->birthday
                        ]);
        
        if ($request->hasFile('img')) {
            File::delete('images/user_profile/'.$request->id.'.png');
            $image = $request->file('img');
            $storedPath = $image->move('images/user_profile', $request->id.'.png');
        }
        return redirect()->action('CustomerController@index');
    }

    public function delete(Request $request)
    {
        File::delete('images/user_profile/'.$request->id.'.png');
        $apartment = DB::table('apartments')
                        ->where('customer_id',$request->id)
                        ->update(['customer_id' => NULL]);
        $customer = DB::table('customers')->where('id', $request->id)->delete();
        return redirect()->action('CustomerController@index');
    }

    public function removeApartment(Request $request)
    {
        # code...
        $apartment = DB::table('apartments')
                        ->where('id',$request->apartment_id)
                        ->update(['customer_id' => NULL]);
        return redirect()->route('customer/edit', ['id' => $request->customer_id]);
    }

    public function modifyApartment(Request $request)
    {
        # code...
        $apartment = DB::table('apartments')
                        ->where('id',$request->apartment)
                        ->update(['customer_id' => $request->customer_id]);
        return redirect()->route('customer/edit', ['id' => $request->customer_id]);
    }
}
