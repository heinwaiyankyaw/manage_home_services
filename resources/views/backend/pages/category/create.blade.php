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
    </style>
    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing mt-5">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <a href="{{ route('admin.category.list') }}" class="btn btn-sm btn-outline-primary" title="Go back">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg> Back
                    </a>
                    <h4 class="mb-0 text-center flex-grow-1">Create New Category</h4>
                    <div style="width: 80px;"></div>
                </div>
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter category name">
                        @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block py-3" title="Create Category">
                            <i class="fas fa-plus-circle mr-2"></i> Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
