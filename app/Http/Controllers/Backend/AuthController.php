<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AuthLoginRequest;

class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('backend.pages.Auth.login');
    }

    /**
     * Handle the login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginPost(AuthLoginRequest $request)
    {
        // Validate the request
        $request->validated();

        // Redirect to the dashboard after successful login
        return redirect()->route('admin.dashboard');
    }

    /**
     * Handle the logout request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Handle the logout logic here
        // For example, log out the user and redirect to the login page

        return redirect()->route('admin.login');
    }
}
