<?php

namespace App\Http\Controllers;

use App\Models\Report;
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
        return view('report', compact('apartment'));
    }

    public function addconfirm(Request $request)
    {
        $messages = [
            'title.required'=>'Vui lòng nhập yêu cầu!',
            'report_info' => 'Vui lòng nhập nội dung yêu cầu!',
            'reporter' => 'Vui lòng nhập tên!',
            'phone.required'=>'Vui lòng nhập số điện thoại liên lạc!',
            'phone.min' => 'Số điện thoại có từ 9 - 13 số!',
            'phone.max' => 'Số điện thoại có từ 9 - 13 số!',
        ];
        $validated = $request->validate([
            'title' => 'required',
            'report_info'=> 'required',
            'reporter'=> 'required',
            'phone'=> 'required|min:9|max:13',
        ], $messages);

        $report = new Report;
        $report->title = $request->title;
        $report->reporter = $request->reporter;
        $report->report_info = $request->report_info;
        $report->phone = $request->phone;
        $report->email = $request->email;
        $report->save();

        return redirect('/report/complete');
    }

    public function delete(Request $request)
    {
        $report = DB::table('report')->where('id', $request->id)->delete();
        return redirect()->action('ReportController@index');
    }
}
