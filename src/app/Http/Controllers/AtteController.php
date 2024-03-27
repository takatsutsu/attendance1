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
        $atte = $request->only(['user_id','work_date','work_start_time']);
        Attendee::create($atte);
        return view('complete');
    }

}
