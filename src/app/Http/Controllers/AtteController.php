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

class AtteController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $today = date("Y-m-d");
        $today_time = date("Y-m-d H:i:s");

        $existsAtte = Attendee::where('user_id', $user->id)->where('work_date', $today)->exists();
        $dosentAtte = Attendee::where('user_id', $user->id)->where('work_date', $today)->doesntExist();
        $query = Attendee::where('user_id', $user->id)->where('work_date', $today)->latest()->first();
        if ($dosentAtte){
            $flag1 = 'A';
        }

        if ($existsAtte) {
            if (!empty($query->work_end_time)) {
                $flag1 = 'E';
            }
            else
            {
                $existsBrea = Breaktime::where('user_id', $user->id)->where('break_date', $today)->exists();
                $query2 = Breaktime::where('user_id', $user->id)->where('break_date', $today)->latest()->first();
                if ($existsBrea)
                    {
                        if (!empty($query2->break_end_time))
                        {
                        $flag1 = 'C';
                        }
                        else
                        {
                        $flag1 = 'D';
                        }
                    } 
                    
                    else
                    {
                    $flag1 = 'C';
                    }
            }


        return view('index', compact('user','flag1'));
    }
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
        $atte = ([
            'work_end_time' => $today_time
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
        $atte = ([
            'break_end_time' => $today_time
        ]);
        Breaktime::find($query->id)->update($atte);

        return view('complete');
    }
}
