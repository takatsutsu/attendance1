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
        $hours = floor($span_time / 3600);
        $minutes = floor(($span_time % 3600) / 60);
        $seconds = $span_time % 60;
        $hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

        $atte = ([
            'work_end_time' => $today_time,
            'work_span_time' => $hms,
            'work_span_second' => $span_time
        ]);
        Attendee::find($query->id)->update($atte);

        return view('complete');
    }

    public function breakstart(Request $request)
    {
        $today = date("Y-m-d");
        $today_time = date("Y-m-d H:i:s");
        $query = Attendee::where('user_id', $request->user_id)->where('work_date', $today)->latest()->first();
        $atte = ([
            'user_id' => $request->user_id,
            'break_date' => $today,
            'break_start_time' => $today_time,
            'attendee_id' => $query['id']
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
            'break_span_time' => $hms,
            'break_span_second' => $span_time
        ]);
        Breaktime::find($query->id)->update($atte);

        return view('complete');
    }

    public function sumsearch()
    {
        $day = date("Y-m-d");
        $user = Auth::User();

        $last_date = $day;
        $date_timestamp = strtotime($last_date);
        $last_day_timestamp = $date_timestamp - 86400;
        $l_day = date("Y-m-d", $last_day_timestamp);

        $next_date = $day;
        $date_timestamp = strtotime($next_date);
        $next_day_timestamp = $date_timestamp + 86400;
        $n_day = date("Y-m-d", $next_day_timestamp);

        $atte = ([
            'date_search' => $day,
            'last_search' => $l_day,
            'next_search' => $n_day
        ]);

        $query = Attendee::query()->leftJoin('breaktimes', 'attendees.id', '=', 'breaktimes.attendee_id')
            ->select(
                'attendees.id',
                'attendees.user_id',
                'attendees.work_date',
                'attendees.work_start_time',
                'attendees.work_end_time',
                'attendees.work_span_time',
                'attendees.work_span_second',
                \DB::raw('SUM(breaktimes.break_span_second) as break_total')
            )
            ->whereDate('work_date', $day)->groupby('attendees.id');
        $query2 = Breaktime::query();


        $attendees =  $query->with('User')->paginate(5);

        return view('sumsearch', compact('attendees', 'user', 'atte', 'day'));
    }

    public function sumresearch(Request $request)
    {
        $day = $request->date_search;;
        $user = Auth::User();

        $last_date = $request->date_search;
        $date_timestamp = strtotime($last_date);
        $last_day_timestamp = $date_timestamp - 86400;
        $l_day = date("Y-m-d", $last_day_timestamp);

        $next_date = $request->date_search;
        $date_timestamp = strtotime($next_date);
        $next_day_timestamp = $date_timestamp + 86400;
        $n_day = date("Y-m-d", $next_day_timestamp);

        $atte = ([
            'date_search' => $day,
            'last_search' => $l_day,
            'next_search' => $n_day
        ]);

        $query = Attendee::query()->leftJoin('breaktimes', 'attendees.id', '=', 'breaktimes.attendee_id')
            ->select(
                'attendees.id',
                'attendees.user_id',
                'attendees.work_date',
                'attendees.work_start_time',
                'attendees.work_end_time',
                'attendees.work_span_time',
                'attendees.work_span_second',
                \DB::raw('SUM(breaktimes.break_span_second) as break_total')
            )
            ->whereDate('attendees.work_date', $day)->groupby('attendees.id');
        $query2 = Breaktime::query();


        $attendees =  $query->with('User')->paginate(5);

        return view('sumsearch', compact('attendees', 'user', 'atte', 'day'));
    }

}
