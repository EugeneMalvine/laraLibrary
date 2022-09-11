<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function getHome(): View
    {
        return view('user.index');
    }

    public function getProfile(): View
    {
        return view('user.profile', ['user' => Auth::user()]);
    }
}
