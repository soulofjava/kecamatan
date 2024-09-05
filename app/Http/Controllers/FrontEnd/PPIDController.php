<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\FrontEndController;
use Illuminate\Http\Request;

class PPIDController extends FrontEndController
{
    public function index()
    {
        return view('ppid');
    }

    public function detail($slug)
    {
        return view('detailppid', ['slug' => $slug]);
    }
}
