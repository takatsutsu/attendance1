<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ContactRequest;
use App\Models\Attendee;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

class AtteController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        return view('index', compact('user'));
    }

    public function workstart(Request $request)
    {
        $today = date("Y-m-d");
        $today_time = date("Y-m-d H:i:s");

        $atte = ([
            'user_id' => $request->user_id,
            'work_date' => $today,
            'work_start_time' => $today_time
        ]);
        Attendee::create($atte,);
        return view('complete');
    }

    public function workend(Request $request)
    {
        $user = Auth::User();

        $today = date("Y-m-d");
        $today_time = date("Y-m-d H:i:s");

        $query = Attendee::where('user_id', $request->user_id)->where('work_date', $today)->latest()->first();
        $atte = ([
            'work_end_time' => $today_time
        ]);
        Attendee::find($query->id)->update($atte);

        return view('complete');
    }
}
