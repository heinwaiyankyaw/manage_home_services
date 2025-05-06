@extends('backend.layouts.master')
@section('content')
    <style>
        .btn-block {
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-block:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }


        .card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 10px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .shadow-sm {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .text-primary {
            color: #4361ee !important;
        }

        hr {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
    </style>
    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing mt-5">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <a href="{{ route('admin.users.list') }}" class="btn btn-sm btn-outline-primary" title="Go back">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg> Back
                    </a>
                    <h4 class="mb-0 text-center flex-grow-1">View Customer</h4>
                    <div style="width: 80px;"></div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-sm animate__animated animate__fadeIn">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <!-- Customer Image with default fallback -->
                                        <div class="mb-3">
                                            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('backend/assets/img/90x90.jpg') }}"
                                                alt="Customer Image" class="img-fluid rounded-circle shadow"
                                                style="width: 180px; height: 180px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="card-title text-primary">{{ $user->name }}</h3>
                                        <hr class="mt-2 mb-3">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <h6 class="text-muted mb-1">Username</h6>
                                                    <p class="font-weight-bold">{{ $user->username }}</p>
                                                </div>

                                                <div class="mb-3">
                                                    <h6 class="text-muted mb-1">Email</h6>
                                                    <p class="font-weight-bold">{{ $user->email }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <h6 class="text-muted mb-1">Phone</h6>
                                                    <p class="font-weight-bold">{{ $user->phone ?? 'N/A' }}</p>
                                                </div>

                                                <div class="mb-3">
                                                    <h6 class="text-muted mb-1">Member Since</h6>
                                                    <p class="font-weight-bold">
                                                        {{ $user->created_at->format('M d, Y') }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <h6 class="text-muted mb-1">Address</h6>
                                            <p class="font-weight-bold">{{ $user->address ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <small class="text-muted">Last updated {{ $user->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
