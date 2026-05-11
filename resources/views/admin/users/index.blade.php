@extends('layouts.app')

@section('content')

<div class="m-3">
    <!-- Page Header -->
    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-3 mb-4">

        <div class="flex-grow-1">
            <h3 class="mb-0">
                Users
                <a href="{{ route('users.index') }}" class="btn btn-icon btn-sm btn-white rounded-circle ms-2">
                    <i class="icon-refresh-ccw"></i>
                </a>
            </h3>
        </div>

        <div class="gap-2 d-flex align-items-center flex-wrap">

            <a class="btn btn-primary d-inline-flex align-items-center"
               data-bs-toggle="modal"
               data-bs-target="#add_users">
                <i class="icon-circle-plus me-1"></i>
                Add New
            </a>

        </div>

    </div>
    <!-- Page Header End -->


    <!-- Users Card -->
    <div class="card mb-0">

        <div class="card-body">

            <!-- Table -->
            <div class="table-responsive table-nowrap">

                <table class="table mb-0 border">

                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($users as $user)

                        <tr>

                            <td>
                                <div class="d-flex align-items-center">

                                    <a class="avatar avatar-sm avatar-rounded flex-shrink-0 me-2">

                                        <img src="{{ $user->getFirstMediaUrl('users') ?: asset('assets/img/users/user-01.jpg') }}"
                                             class="img-fluid">

                                    </a>

                                    <h6 class="fs-14 fw-normal mb-0">

                                        {{ $user->name }}

                                    </h6>

                                </div>
                            </td>

                            <td>
                                {{ $user->roles->pluck('name')->first() }}
                            </td>

                            <td>
                                {{ $user->mobile }}
                            </td>

                            <td>

                                @if($user->status == 'active')
                                    <span class="badge badge-soft-success">Active</span>
                                @else
                                    <span class="badge badge-soft-danger">Inactive</span>
                                @endif

                            </td>

                            <td>

                                <a class="btn btn-icon btn-sm btn-white rounded-circle me-2"
                                   data-bs-toggle="modal"
                                   data-bs-target="#edit_users_{{ $user->id }}">
                                    <i class="icon-pencil-line"></i>
                                </a>

                                <form action="{{ route('users.delete',$user->id) }}"
                                      method="POST"
                                      style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-icon btn-sm btn-white rounded-circle">
                                        <i class="icon-trash-2"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</div>



    <!-- Add User Modal -->

    <div class="modal fade" id="add_users">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header border-0 p-4 pb-3">

                    <h4 class="modal-title">Add New User</h4>

                    <button type="button"
                            class="btn-close btn-close-modal"
                            data-bs-dismiss="modal">
                        <i class="icon-x"></i>
                    </button>

                </div>

                <form action="{{ route('users.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body p-4 pt-1">

                        <div class="mb-3">

                            <label class="form-label">
                                User Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control">

                        </div>


                        <div class="row">

                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">First Name</label>

                                    <input type="text"
                                           name="first_name"
                                           class="form-control">

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">Last Name</label>

                                    <input type="text"
                                           name="last_name"
                                           class="form-control">

                                </div>

                            </div>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">Role</label>

                            <select name="role"
                                    class="form-control">

                                @foreach($roles as $role)

                                    <option value="{{ $role->name }}">
                                        {{ $role->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">Phone Number</label>

                            <input type="text"
                                   name="mobile"
                                   class="form-control">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">Status</label>

                            <select name="status"
                                    class="form-control">

                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>

                        </div>


                        <div class="d-flex align-items-center justify-content-between gap-2 pt-1">

                            <button type="button"
                                    class="btn btn-light w-100"
                                    data-bs-dismiss="modal">

                                Cancel

                            </button>

                            <button type="submit"
                                    class="btn btn-primary w-100">

                                Save

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <!-- Edit User Modals -->

    @foreach($users as $user)

    <div class="modal fade"
         id="edit_users_{{ $user->id }}">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header border-0 p-4 pb-3">

                    <h4 class="modal-title">
                        Edit User
                    </h4>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                        <i class="icon-x"></i>
                    </button>

                </div>


                <form action="{{ route('users.update',$user->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body p-4 pt-1">

                        <div class="mb-3">

                            <label class="form-label">
                                User Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control">

                        </div>


                        <div class="row">

                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        First Name
                                    </label>

                                    <input type="text"
                                           name="first_name"
                                           value="{{ explode(' ',$user->name)[0] }}"
                                           class="form-control">

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Last Name
                                    </label>

                                    <input type="text"
                                           name="last_name"
                                           value="{{ explode(' ',$user->name)[1] ?? '' }}"
                                           class="form-control">

                                </div>

                            </div>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Role
                            </label>

                            <select name="role"
                                    class="form-control">

                                @foreach($roles as $role)

                                    <option value="{{ $role->name }}"
                                        {{ $user->hasRole($role->name) ? 'selected' : '' }}>

                                        {{ $role->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Phone Number
                            </label>

                            <input type="text"
                                   name="mobile"
                                   value="{{ $user->mobile }}"
                                   class="form-control">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Status
                            </label>

                            <select name="status"
                                    class="form-control">

                                <option value="active"
                                    {{ $user->status == 'active' ? 'selected' : '' }}>

                                    Active

                                </option>

                                <option value="inactive"
                                    {{ $user->status == 'inactive' ? 'selected' : '' }}>

                                    Inactive

                                </option>

                            </select>

                        </div>


                        <div class="d-flex align-items-center justify-content-end gap-2 pt-1">

                            <button type="button"
                                    class="btn btn-light"
                                    data-bs-dismiss="modal">

                                Cancel

                            </button>

                            <button type="submit"
                                    class="btn btn-primary">

                                Save

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    @endforeach

@endsection