<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Service;

class PaymentController extends Controller
{
    public function providerPaymentList()
    {
        $serviceIds = Service::where('user_id', auth()->id())->pluck('id');
        $bookingIds = Booking::whereIn('service_id', $serviceIds)
            ->pluck('id');
        $payments = Payment::whereIn('booking_id', $bookingIds)->orderBy('updated_at', 'desc')->get();
        return view('provider.pages.payment.index', compact('payments'));
    }

    public function providerPaymentStatus($id)
    {
        $payment = Payment::findOrFail($id);
        $booking = Booking::findOrFail($payment->booking_id);

        if ($payment->status == 'pending') {
            $booking->payment_status = 'paid';
            $payment->status         = 'completed';
        }
        $booking->update();
        $payment->update();
        return back()->with('success', 'Payment has been made.');
    }

    public function providerPaymentReject($id)
    {
        $payment = Payment::findOrFail($id);
        $booking = Booking::findOrFail($payment->booking_id);

        $payment->status         = 'failed';
        $booking->payment_status = 'failed';

        $payment->update();
        $booking->update();

        return back()->with('success', 'Payment has been reject');
    }
}
