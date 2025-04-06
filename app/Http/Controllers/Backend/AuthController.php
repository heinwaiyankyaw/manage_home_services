<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.pages.Auth.login');
    }
}
