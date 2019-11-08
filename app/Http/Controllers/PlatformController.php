<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PlatformController extends BaseController
{

    public function index()
    {
        return Inertia::render('Platform/Select');
    }
    public function update(Request $request)
    {
        $data = $request->validate(['current_platform' => 'required']);
        auth()->user()->update($data);
        return redirect('/');
    }
}
