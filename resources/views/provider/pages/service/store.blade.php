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
                    <a href="{{ route('provider.services.list') }}" class="btn btn-sm btn-outline-primary" title="Go back">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg> Back
                    </a>
                    <h4 class="mb-0 text-center flex-grow-1">Edit Service</h4>
                    <div style="width: 80px;"></div>
                </div>
                <form action="{{ route('provider.services.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-4 col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Service name">
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4 col-md-6">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price"
                                placeholder="Enter Service price">
                            @error('price')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration"
                            placeholder="Enter Service duration">
                        @error('duration')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                        @error('description')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-md-6">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Please Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4 col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive
                                </option>
                            </select>
                            @error('status')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block py-3" title="Update Service">
                            <i class="fas fa-plus-circle mr-2"></i> Create Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
