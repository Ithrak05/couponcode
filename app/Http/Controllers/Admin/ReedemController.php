<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReedemController extends Controller
{
    public function verify()
    {
        return view('admin.redeem.index');
    }
}
