<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ContactRequest;
use App\Models\Attendee;
use App\Models\Breaktime;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use Carbon\Carbon;
use CreateAttendeesTable;

class AtteController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $today = date("Y-m-d");
        $today_time = date("Y-m-d H:i:s");

        $query = Attendee::where('user_id', $user->id)->where('work_date', $today)->latest()->first();

        if ($query == null) {
            $btn1 = 'A';
        }

        if ($query <> null) {
            if ($query->work_end_time <> null) {
                $btn1 = 'E';
            }

            if ($query->work_end_time == null) {
                $query2 = Breaktime::where('user_id', $user->id)->where('break_date', $today)->latest()->first();
                if ($query2 == null) {
                    $btn1 = 'B';
                }
                if ($query2 <> null) {
                    if ($query2->break_end_time <> null) {
                        $btn1 = 'C';
                    }
                    if ($query2->break_end_time == null) {
                        $btn1 = 'D';
                    }
                }
            }
        }

        return view('index', compact('user', 'btn1'));
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

        $today = date("Y-m-d");
        $today_time = date("Y-m-d H:i:s");

        $query = Attendee::where('user_id', $request->user_id)->where('work_date', $today)->latest()->first();

        $start_date = new Carbon($query['work_start_time']);
        $end_date = new Carbon($today_time);
        $span_time = $start_date->diffInSeconds($end_date);
        var_dump($span_time);
        $hours = floor($span_time / 3600);
        $minutes = floor(($span_time % 3600) / 60);
        $seconds = $span_time % 60;
        $hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

        $atte = ([
            'work_end_time' => $today_time,
            'work_span_time' => $hms
        ]);
        Attendee::find($query->id)->update($atte);

        return view('complete');
    }

    public function breakstart(Request $request)
    {
        $today = date("Y-m-d");
        $today_time = date("Y-m-d H:i:s");

        $atte = ([
            'user_id' => $request->user_id,
            'break_date' => $today,
            'break_start_time' => $today_time
        ]);
        Breaktime::create($atte,);
        return view('complete');
    }

    public function breakend(Request $request)
    {

        $today = date("Y-m-d");
        $today_time = date("Y-m-d H:i:s");

        $query = Breaktime::where('user_id', $request->user_id)->where('break_date', $today)->latest()->first();

        $start_date = new Carbon($query['break_start_time']);
        $end_date = new Carbon($today_time);
        $span_time = $start_date->diffInSeconds($end_date);
        $hours = floor($span_time / 3600);
        $minutes = floor(($span_time % 3600) / 60);
        $seconds = $span_time % 60;
        $hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

        $atte = ([
            'break_end_time' => $today_time,
            'break_span_time' => $hms
        ]);
        Breaktime::find($query->id)->update($atte);

        return view('complete');
    }

    public function sumsearch()
    {
        $date = date("Y-m-d");
        $user = Auth::User();

        $query = Attendee::query();

        $query->whereDate('work_date', $date);

        $atte = ([
            'date_search' => $date
        ]);


        $attendees = $query->with('User')->paginate(2);


        return view('sumsearch', compact('attendees', 'user', 'atte'));
    }

    public function sumresearch(Request $request)
    {
        $date = $request->date_search;
        $user = Auth::User();


        $query = Attendee::query();



        if ($request->has('reset')) {
            return redirect('/sumsearch')->withInput();
        }



        if (!empty($request->date_search)) {
            $query->whereDate('work_date', $request->date_search);
        }

        $atte = ([
            'date_search' => $date
        ]);

        $attendees = $query->with('User')->paginate(2);

        return view('sumsearch', compact('attendees', 'user', 'atte'));
    }
}
