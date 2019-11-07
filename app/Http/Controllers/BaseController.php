<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
}
