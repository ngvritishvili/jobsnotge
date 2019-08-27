<?php

namespace App\Http\Controllers;


use \Illuminate\Http\Request;


class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('profile');
    }

    public function jobs()
    {
        return view('jobs');
    }

    public function contact()
    {
        return view('contact');
    }

    public function companyRegister()
    {
        return view('companyRegister');
    }

    public function personRegister()
    {
        return view('personRegister');
    }

    public function profile( Request $request)
    {

        return view('profile');
    }

    public function jobshow(){
        return view('job.show');
    }
}
