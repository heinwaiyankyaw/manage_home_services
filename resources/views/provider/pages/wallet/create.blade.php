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
                    <a href="{{ route('provider.wallets.list') }}" class="btn btn-sm btn-outline-primary" title="Go back">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg> Back
                    </a>
                    <h4 class="mb-0 text-center flex-grow-1">Create New Wallet</h4>
                    <div style="width: 80px;"></div>
                </div>
                <form action="{{ route('provider.wallets.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Wallet name">
                        @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="img" class="form-label font-weight-bold">Image</label>
                        <input type="file" class="form-control shadow-sm" id="img" name="img_path" accept="image/*"
                            onchange="previewImage(event)">
                        @error('img_path')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4" style="display: none;" id="previewSec">
                        <label class="form-label font-weight-bold">Image Preview</label>
                        <div class="border p-3 rounded bg-light text-center">
                            <img id="imgPreview" src="#" alt="Image Preview"
                                style="display: none; max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block py-3" title="Create Wallet">
                            <i class="fas fa-plus-circle mr-2"></i> Create Wallet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function previewImage(event) {
            const imgPreview = document.getElementById('imgPreview');
            const previewSec = document.getElementById('previewSec');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                    previewSec.style.display = 'block';
                    imgPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                imgPreview.src = '#';
                previewSec.style.display = 'none';
                imgPreview.style.display = 'none';
            }
        }
    </script>
@endsection
