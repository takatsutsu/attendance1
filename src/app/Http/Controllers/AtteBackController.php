<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ContactRequest;



class AtteController extends Controller
{
    public function index()
    {

        return view('index');
    }


    public function store()
    {
        return view('complete');
    }
}
