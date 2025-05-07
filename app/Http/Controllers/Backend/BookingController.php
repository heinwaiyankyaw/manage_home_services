<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;

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
}
