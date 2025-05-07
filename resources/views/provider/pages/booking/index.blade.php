@extends('backend.layouts.master')
@section('content')
    <div class="row align-items-center my-4">
        <div class="col-md-6">
            <h3 class="mb-0 font-weight-bold">Bookings</h3>
        </div>
        <div class="col-md-6 text-md-right">
        </div>
    </div>

    <div class="row" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Service Name</th>
                                <th>Booking Date</th>
                                <th>Payment Status</th>
                                <th>Booking</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->service->name }}</td>
                                    <td>{{ $booking->booking_date }}</td>
                                    <td>{{ $booking->payment_status }}</td>
                                    <td>
                                        @if ($booking->status == 'completed')
                                            <span class="badge badge-primary">Completed</span>
                                        @elseif ($booking->status == 'confirmed')
                                            <span class="badge badge-secondary">Confirmed</span>
                                        @elseif ($booking->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @else
                                            <span class="badge badge-danger">Canceled</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!in_array($booking->status, ['completed', 'canceled']))
                                            <form action="{{ route('provider.bookings.status', $booking->id) }}"
                                                method="POST" id="status-form-{{ $booking->id }}" class="d-inline">
                                                @csrf
                                                @method('POST')
                                                <button type="button" class="btn btn-success btn-sm status-btn"
                                                    title="Change Status" data-id="{{ $booking->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-check">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </button>
                                            </form>

                                            <form action="{{ route('provider.bookings.reject', $booking->id) }}"
                                                method="POST" id="reject-form-{{ $booking->id }}" class="d-inline">
                                                @csrf
                                                @method('POST')
                                                <button type="button" class="btn btn-danger btn-sm reject-btn"
                                                    title="Reject Booking" data-id="{{ $booking->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6" y2="18">
                                                        </line>
                                                        <line x1="6" y1="6" x2="18" y2="18">
                                                        </line>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.status-btn').click(function() {
                const formId = 'status-form-' + $(this).data('id');

                Swal.fire({
                    title: 'Change Booking Status?',
                    text: "The booking status will be updated.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                });
            });

            $('.reject-btn').click(function() {
                const formId = 'reject-form-' + $(this).data('id');

                Swal.fire({
                    title: 'Reject Booking?',
                    text: "The booking will be rejected.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, reject it!',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                });
            });
        });
    </script>
@endsection
