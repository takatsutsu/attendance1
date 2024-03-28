<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ContactRequest;
use App\Models\Attendee;
use Illuminate\Http\Response;



class AtteController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $work_date = date("Y-m-d");
        $work_start_time = date("Y-m-d H:i:s");

        $atte = $request->only(['user_id', 'work_date', 'work_start_time']);
        Attendee::create($atte,)->with([
            'work_start_time' => $work_start_time,
            'work_date'=>$work_date
            ]);
        return view('complete');
    }
}
