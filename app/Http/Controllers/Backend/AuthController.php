<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AuthLoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */

    public function login($slugName)
    {
        if ($slugName == 'admin' || $slugName == 'provider') {
            return view('backend.pages.Auth.login', compact('slugName'));
        }

        return abort(404);
    }

    /**
     * Handle the login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginPost(AuthLoginRequest $request, $slugName)
    {
        // Validate the request
        $data = $request->validated();
        Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
        // Check if the user is authenticated
        if (! Auth::check()) {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
        // Check the user's role and redirect accordingly
        $user = Auth::user();

        // Redirect to the dashboard after successful login
        if ($slugName == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($slugName == 'provider') {
            return redirect()->route('provider.dashboard');
        } else {
            return abort(404);
        }

    }

    /**
     * Handle the logout request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminlogout()
    {
        Auth::logout();
        return redirect()->route('admin.login', ['slugname' => 'admin']);
    }

    public function providerlogout()
    {
        Auth::logout();
        return redirect()->route('admin.login', ['slugname' => 'provider']);
    }
}