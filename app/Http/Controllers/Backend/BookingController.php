<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Wallet;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function providerBookingList()
    {
        $serviceIds = Service::where('user_id', auth()->id())->pluck('id');

        // Fetch all bookings for those services
        $bookings = Booking::whereIn('service_id', $serviceIds)
            ->orderBy('updated_at', 'desc')
            ->get();

        // Return the view with the bookings
        return view('provider.pages.booking.index', compact('bookings'));

    }

    public function providerBookingStatus($id)
    {
        $booking = Booking::findOrFail($id);
        if ($booking->status == 'pending') {
            $booking->status = 'confirmed';
        } else {
            $booking->status = 'completed';
        }
        $booking->update();
        return back()->with('success', 'Booking Status was changed');
    }

    public function providerBookingReject($id)
    {
        $booking         = Booking::findOrFail($id);
        $booking->status = 'canceled';
        $booking->update();
        return back()->with('success', 'Booking was rejected.');
    }

    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())->get();

        // Extract service IDs from bookings
        $serviceIds = $bookings->pluck('service_id')->unique();

        // Get user_ids (i.e., service providers) of those services
        $providerIds = Service::whereIn('id', $serviceIds)->pluck('user_id');

        // Get wallets of those service providers
        $wallets = Wallet::whereIn('user_id', $providerIds)->get();

        return view('user.pages.bookings.index', compact('bookings', 'wallets'));
    }

    public function confirmBooking(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'wallet_id'  => 'required|exists:wallets,id',
        ]);

        $booking = Booking::findOrFail($validated['booking_id']);
        $wallet  = Wallet::findOrFail($validated['wallet_id']);

        $booking->status         = 'confirmed';
        $booking->payment_status = 'paid';
        // Deduct the amount from the wallet

        Payment::create([
            'booking_id'     => $booking->id,
            'payment_method' => $wallet->name,
            'transaction_id' => rand(00000, 99999),
            'amount'         => $booking->service->price,
            'status'         => 'pending',
        ]);

        // Update the booking status
        $booking->status = 'confirmed';
        $booking->save();

        return redirect()->route('user.booking')->with('success', 'Booking confirmed and payment successful.');
    }
}
