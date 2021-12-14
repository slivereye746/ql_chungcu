<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('users',compact('users'));
    }

    public static function getUser($id)
    {
        $user = User::where("id",$id)->first();
        return view("user_detail", compact('user'));
    }

    public function edit($id)
    {
        # code...
        $user = User::where("id",$id)->first();
        return view("user_edit", compact('user'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email,'.$request->id],
            'password' => ['required', Rules\Password::defaults()],
        ]);
        # code...
        if ($request->password!=NULL) {
            # code...
            $apartment = DB::table('users')
                        ->where('id',$request->id)
                        ->update([
                            'name' => $request->name, 
                            'email' => $request->email,
                            'password' => Hash::make($request->password)
                        ]);
        } else {
            $apartment = DB::table('users')
            ->where('id',$request->id)
            ->update([
                'name' => $request->name, 
                'email' => $request->email
            ]);
        }
        
        return redirect()->action('UserController@index');
    }

    public function delete(Request $request)
    {
        if ($request->id !=1) {
            # code...
            $user = DB::table('users')->where('id', $request->id)->delete();
        }
        return redirect()->action('UserController@index');
    }
}
