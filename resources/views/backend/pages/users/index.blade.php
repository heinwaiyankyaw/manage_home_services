@extends('backend.layouts.master')
@section('content')
    <div class="row align-items-center my-4">
        <div class="col-md-6">
            <h3 class="mb-0 font-weight-bold">Users</h3>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->status == 'active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Edit Button with SweetAlert Confirmation -->
                                        <button type="button" class="btn btn-primary btn-sm edit-btn" title="Edit"
                                            data-edit-url="{{ route('admin.users.view', $user->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <!-- Delete Button with SweetAlert (Improved) -->
                                        @if ($user->status == 'active')
                                            <form action="{{ route('admin.users.ban', $user->id) }}" method="POST"
                                                id="delete-form-{{ $user->id }}" class="d-inline">
                                                @csrf
                                                @method('POST')
                                                <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                    title="Ban" data-id="{{ $user->id }}">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.users.ban', $user->id) }}" method="POST"
                                                id="delete-form-{{ $user->id }}" class="d-inline">
                                                @csrf
                                                @method('POST')
                                                <button type="button" class="btn btn-success btn-sm delete-btn"
                                                    title="UnBan" data-id="{{ $user->id }}">
                                                    <i class="fas fa-undo"></i>
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
            // Edit button - Confirm before navigation
            $('.edit-btn').click(function() {
                const editUrl = $(this).data('edit-url');

                Swal.fire({
                    title: 'View user?',
                    text: "You'll be redirected to the view page",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, view it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = editUrl;
                    }
                });
            });

            // Delete button - Confirm before submission
            $('.delete-btn').click(function() {
                const formId = 'delete-form-' + $(this).data('id');

                Swal.fire({
                    title: 'Wanna Ban or UnBan this user?',
                    text: "User Status will be changed.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes!',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                });
            });

            // Show success message if exists
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif
        });
    </script>
@endsection
