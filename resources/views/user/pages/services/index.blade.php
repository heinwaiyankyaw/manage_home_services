@extends('user.layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Services</h1>

        <!-- Filter by Category -->
        <form method="GET" action="{{ route('user.services.index') }}" class="mb-4">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <select name="category" class="form-control">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
                </div>
            </div>
        </form>

        <!-- Services -->
        <div class="row">
            @forelse ($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->name }}</h5>
                            <p class="card-text">{{ Str::limit($service->description, 100) }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $service->category->name }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $service->price }}</p>
                            <p class="card-text"><strong>Duration:</strong> {{ $service->duration }} hrs</p>
                            <button type="button" class="btn btn-success btn-block book-service" data-toggle="modal"
                                data-target="#serviceBookingModal" data-service-id="{{ $service->id }}"
                                data-service-name="{{ $service->name }}">Book</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No services found.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Booking Modal (Single instance outside the loop) -->
    <div class="modal fade" id="serviceBookingModal" tabindex="-1" role="dialog"
        aria-labelledby="serviceBookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="serviceBookingModalLabel">Book Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="" id="bookingForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="serviceName">Service</label>
                            <input type="text" class="form-control" id="serviceName" readonly>
                        </div>
                        <div class="form-group">
                            <label for="date">Booking Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Booking Time</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Handle book service button click
            $('.book-service').on('click', function() {
                var serviceId = $(this).data('service-id');
                var serviceName = $(this).data('service-name');

                // Set the form action
                $('#bookingForm').attr('action', '/services/book/' + serviceId);

                // Set the service name in the modal
                $('#serviceName').val(serviceName);

                // Show the modal
                $('#serviceBookingModal').modal('show');
            });
        });
    </script>
@endsection
