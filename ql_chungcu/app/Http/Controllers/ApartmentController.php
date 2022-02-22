<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Customer;
use App\Models\Customer_Scd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    //
    public function index()
    {
        $apartment = Apartment::all();
        return view('dashboard',compact('apartment'));
    }

    public static function getApartment($id)
    {
        $apartment = Apartment::where("id",$id)->first();
        $customer = Customer_Scd::where("apartment_id",$id)->get();
        $owner = Customer::where("id",$apartment->customer_id)->first();
        return view("apartment_detail", compact('apartment','customer', 'owner'));
    }

    public function edit($id)
    {
        # code...
        $apartment = Apartment::where("id",$id)->first();
        if ($apartment->customer_id != NULL) {
            # code...
            $owner = Customer::where("id",$apartment->customer_id)->first();
        }
        else 
        {
            $owner = NULL;
        }
        return view("apartment_edit", compact('apartment', 'owner'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $apartment = DB::table('apartments')
                        ->where('id',$id)
                        ->update([
                            'name' => $request->name, 
                            'price' => $request->price, 
                            'description' => $request->description
                        ]);
        return redirect()->action('ApartmentController@index');
    }
}
