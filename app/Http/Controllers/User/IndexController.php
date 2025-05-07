<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AuthLoginRequest;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('user.pages.index.index');
    }

    public function contact()
    {
        return view('user.pages.contact.index');
    }

    public function login()
    {
        return view('user.pages.auth.login');
    }

    public function register()
    {
        return view('user.pages.auth.register');
    }

    public function userLogin(AuthLoginRequest $request)
    {
        $data = $request->validated();
        Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
        // Check if the user is authenticated
        if (! Auth::check()) {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
        // Check the user's role and redirect accordingly
        $user = Auth::user();

        // Redirect to the dashboard after successful login
        return redirect()->route('user.index')->with('toastify', [
            'text'     => 'Welcome back, ' . Auth::user()->name . '!',
            'type'     => 'success',
            'duration' => 5000,
            'close'    => true,
        ]);

    }

    public function userRegister(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'phone'    => 'required|string|max:20|unique:users',
            'address'  => 'required|string|max:500',
            'password' => 'required|string|min:8|confirmed',
            'terms'    => 'accepted',
        ]);

        try {
            $roleID   = Role::where('name', 'Customer')->first()->id;
            $name     = str_replace(' ', '_', $validated['name']);
            $username = $name . "_" . rand(100, 999);
            // Create the user
            $user = User::create([
                'name'     => $validated['name'],
                'username' => $username,
                'email'    => $validated['email'],
                'phone'    => $validated['phone'],
                'address'  => $validated['address'],
                'password' => Hash::make($validated['password']),
                'role_id'  => $roleID,
            ]);

            // Log the user in
            Auth::login($user);
            // Redirect to dashboard
            return redirect()->route('user.index')->with('toastify', [
                'text'     => 'Welcome back, ' . Auth::user()->name . '!',
                'type'     => 'success',
                'duration' => 5000,
                'close'    => true,
            ]);

        } catch (\Exception $e) {
            // Handle any exceptions
            return back()->withError('error', 'Registration failed. Please try again.')->with('toastify', [
                'text' => 'Invalid credentials. Please try again.',
                'type' => 'error',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return back()->with('toastify', [
            'text'     => 'Logout success ' . '!',
            'type'     => 'success',
            'duration' => 5000,
            'close'    => true,
        ]);
    }

    public function servicePage(Request $request)
    {
        $categories = Category::all();
        $query      = Service::query();

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $services = $query->orderBy('updated_at', 'desc')->get();

        return view('user.pages.services.index', compact('services', 'categories'));
    }

    public function serviceBooking(Request $request, $id)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'date' => ['required', 'date', 'after_or_equal:today'],
                'time' => ['required', 'date_format:H:i'],
            ]);

            // Format the date
            $formattedDate = Carbon::parse($validated['date'])->format('Y-m-d');

            // Combine date and time
            $dateTime = $formattedDate . ' ' . $validated['time'];

            // Optional: convert to Carbon datetime
            $bookingDateTime = Carbon::parse($dateTime);

            Booking::create([
                'service_id'   => $id,
                'user_id'      => auth()->user()->id,
                'booking_date' => $bookingDateTime,
            ]);
            return redirect()->route('user.services.index')->with('toastify', [
                'text'     => 'Your booking was booked!',
                'type'     => 'success',
                'duration' => 5000,
                'close'    => true,
            ]);
        } catch (\Exception $e) {
            // Redirect back with error message
            return back()->withErrors(['error' => 'Something went wrong while booking the service. Please try again.'])->with('toastify', [
                'text' => 'Something went wrong while booking the service. Please try again.',
                'type' => 'error',
            ]);
        }
    }
}
