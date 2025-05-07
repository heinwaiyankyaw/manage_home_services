@extends('backend.layouts.master')
@section('content')
    <div class="row align-items-center my-4">
        <div class="col-md-6">
            <h3 class="mb-0 font-weight-bold">Payments</h3>
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
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->booking->user->name }}</td>
                                    <td>{{ $payment->booking->service->name }}</td>
                                    <td>{{ $payment->booking->booking_date }}</td>
                                    <td>{{ $payment->amount * 1 }} MMK</td>
                                    <td>
                                        @if ($payment->status == 'completed')
                                            <span class="badge badge-primary">Completed</span>
                                        @elseif ($payment->status == 'confirmed')
                                            <span class="badge badge-secondary">Confirmed</span>
                                        @elseif ($payment->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @else
                                            <span class="badge badge-danger">Canceled</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!in_array($payment->status, ['completed', 'canceled']))
                                            <form action="{{ route('provider.payments.status', $payment->id) }}"
                                                method="POST" id="status-form-{{ $payment->id }}" class="d-inline">
                                                @csrf
                                                @method('POST')
                                                <button type="button" class="btn btn-success btn-sm status-btn"
                                                    title="Change Status" data-id="{{ $payment->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-check">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </button>
                                            </form>

                                            <form action="{{ route('provider.payments.reject', $payment->id) }}"
                                                method="POST" id="reject-form-{{ $payment->id }}" class="d-inline">
                                                @csrf
                                                @method('POST')
                                                <button type="button" class="btn btn-danger btn-sm reject-btn"
                                                    title="Reject payment" data-id="{{ $payment->id }}">
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
                    title: 'Change payment Status?',
                    text: "The payment status will be updated.",
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
                    title: 'Reject payment?',
                    text: "The payment will be rejected.",
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
