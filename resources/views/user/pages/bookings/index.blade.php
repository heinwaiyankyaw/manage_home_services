@extends('user.layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">My Bookings</h1>

        <!-- Bookings Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Date Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->service->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d-m-Y H:i:s') }}</td>
                            <td>{{ ucfirst($booking->status) }}</td>
                            <td>
                                @if ($booking->status == 'pending')
                                    <button type="button" class="btn btn-primary btn-sm confirm-booking" data-toggle="modal"
                                        data-target="#confirmBookingModal" data-booking-id="{{ $booking->id }}"
                                        data-service-name="{{ $booking->service->name }}">
                                        Confirm
                                    </button>
                                @else
                                    <span class="text-muted">No Action</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Confirm Booking Modal -->
    <div class="modal fade" id="confirmBookingModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmBookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmBookingModalLabel">Confirm Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('user.bookings.confirm') }}" id="confirmBookingForm">
                    @csrf
                    <input type="hidden" name="booking_id" id="bookingId">
                    <div class="modal-body">
                        <p>Choose a wallet to make payment for <strong id="serviceName"></strong>.</p>
                        <div class="form-group">
                            <label for="wallet">Select Wallet</label>
                            <select name="wallet_id" id="wallet" class="form-control" required>
                                <option value="">-- Select Wallet --</option>
                                @foreach ($wallets as $wallet)
                                    <option value="{{ $wallet->id }}">{{ $wallet->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Make Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).on('click', '.confirm-booking', function() {
            var button = $(this); // The button that was clicked
            var bookingId = button.data('booking-id');
            var serviceName = button.data('service-name');

            // Populate modal form fields
            $('#bookingId').val(bookingId);
            $('#serviceName').text(serviceName);

            // Show modal
            $('#confirmBookingModal').modal('show');
        });
    </script>
@endsection
