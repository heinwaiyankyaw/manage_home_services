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

        .password-toggle .input-group-text {
            cursor: pointer;
            border-left: none;
        }

        .password-toggle .form-control {
            border-right: none;
        }

        .password-toggle:hover .form-control,
        .password-toggle:hover .input-group-text {
            border-color: #ced4da;
        }
    </style>
    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing mt-5">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <a href="{{ route('admin.admins.list') }}" class="btn btn-sm btn-outline-primary" title="Go back">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg> Back
                    </a>
                    <h4 class="mb-0 text-center flex-grow-1">Create New Admin</h4>
                    <div style="width: 80px;"></div>
                </div>
                <form action="{{ route('admin.admins.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name">Admin Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Admin name">
                        @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="email">Admin Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Admin email">
                        @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="stak;tus">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <div class="input-group password-toggle">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Admin password">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent">
                                    <i class="fas fa-eye-slash toggle-password" data-target="#password"></i>
                                </span>
                            </div>
                        </div>
                        @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="input-group password-toggle">
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirm Admin password">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent">
                                    <i class="fas fa-eye-slash toggle-password" data-target="#password_confirmation"></i>
                                </span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block py-3" title="Create Admin">
                            <i class="fas fa-plus-circle mr-2"></i> Create Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-password');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const target = document.querySelector(this.getAttribute('data-target'));
                    const isPassword = target.type === 'password';

                    target.type = isPassword ? 'text' : 'password';
                    this.classList.toggle('fa-eye-slash');
                    this.classList.toggle('fa-eye');

                    // Optional: Focus the input after toggle
                    target.focus();
                });
            });
        });
    </script>
@endsection
