@extends('backend.layouts.master')
@section('content')
    <div class="row align-items-center my-4">
        <div class="col-md-6">
            <h3 class="mb-0 font-weight-bold">Reviews</h3>
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
                                <th>Provider Name</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Review Status</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->booking->service->name }}</td>
                                    <td>{{ $review->provider->name }}</td>
                                    <td>{{ $review->review }}</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>
                                        @if ($review->status == 'active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td></td>
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
                    title: 'Change review Status?',
                    text: "The review status will be updated.",
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
                    title: 'Reject review?',
                    text: "The review will be rejected.",
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
