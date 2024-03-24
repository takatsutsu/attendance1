<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Response;



class AtteController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $work_start_time = date("Y-m-d H:i:s");
        $work_date = date("Y-m-d");
        $atte = $request->only(['user_id', 'user_name', 'user_email']);
        return view('complete', compact('atte', 'work_start_time', 'work_date'));
    }

}
