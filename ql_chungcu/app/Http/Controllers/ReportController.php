<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Report;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        # code...
        $reports = Report::all();
        return view('reports', compact('reports'));
    }
    //
    public static function getReport($id)
    {
        $report = Report::where("id",$id)->first();
        return view("report_detail", compact('report'));
    }
    //
    public function add()
    {
        $apartment = DB::table('apartments')->where('customer_id', '=', NULL)->get();
        $mess = '';
        return view('report', compact('apartment', 'mess'));
    }

    public function addconfirm(Request $request)
    {
        $messages = [
            'title.required'=>'Vui lòng nhập yêu cầu!',
            'report_info.required' => 'Vui lòng nhập nội dung yêu cầu!',
            'reporter.required' => 'Vui lòng nhập tên!',
            'cmnd.required' => 'Vui lòng nhập số chứng minh thư!',
            'phone.required'=>'Vui lòng nhập số điện thoại liên lạc!',
            'phone.min' => 'Số điện thoại có từ 9 - 13 số!',
            'phone.max' => 'Số điện thoại có từ 9 - 13 số!',
        ];
        $validated = $request->validate([
            'title' => 'required',
            'report_info'=> 'required',
            'reporter'=> 'required',
            'cmnd'=> 'required',
            'phone'=> 'required|min:9|max:13|unique:customers,cmnd',
        ], $messages);

        $check1 = DB::table('customers')->where('cmnd',$request->cmnd)->first();
        $check2 = DB::table('customer_scd')->where('cmnd',$request->cmnd)->first();
        if ($check1 != NULL && $check1->phone == $request->phone) {
            # code...
            $report = new Report;
            $report->title = $request->title;
            $report->reporter = $request->reporter;
            $report->report_info = $request->report_info;
            $report->phone = $request->phone;
            $report->email = $request->email;
            $report->save();
            return redirect('/report/complete');
        }
        elseif ($check2 != NULL && $check2->phone == $request->phone) {
            # code...
            $report = new Report;
            $report->title = $request->title;
            $report->reporter = $request->reporter;
            $report->report_info = $request->report_info;
            $report->phone = $request->phone;
            $report->email = $request->email;
            $report->save();
            return redirect('/');
        }
        else {
            $mess = 'Thông tin khách hàng không tồn tại!';
            return view('report', compact('mess'));
        } 
    }

    public function delete(Request $request)
    {
        $report = DB::table('report')->where('id', $request->id)->delete();
        return redirect()->action('ReportController@index');
    }
}
