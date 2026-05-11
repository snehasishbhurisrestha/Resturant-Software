@extends('layouts.app')

@section('content')
<div class="m-3">
<div class="d-flex justify-content-between mb-3">
    <h3>Role & Permissions</h3>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_role">
        Add Role
    </button>
</div>

<div class="row">

    <!-- Roles Sidebar -->
    <div class="col-md-3">
        <div class="list-group">
            @foreach($roles as $role)
                <a class="list-group-item list-group-item-action {{ $loop->first ? 'active' : '' }}"
                   data-bs-toggle="tab"
                   href="#role{{ $role->id }}">
                    {{ ucfirst($role->name) }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Permissions -->
    <div class="col-md-9">
        <div class="tab-content">

            @foreach($roles as $role)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                 id="role{{ $role->id }}">

                <form method="POST" action="{{ route('roles.permissions.update') }}">
                    @csrf

                    <input type="hidden" name="role_id" value="{{ $role->id }}">

                    <div class="card">
                        <div class="card-body">

                            <h5>Role: {{ ucfirst($role->name) }}</h5>

                            <div class="row">

                                @foreach($permissions as $group => $groupPermissions)

                                <div class="col-md-4 mb-3">
                                    <h6 class="fw-bold text-primary">
                                        {{ ucfirst($group) }}
                                    </h6>

                                    @foreach($groupPermissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               name="permissions[]"
                                               value="{{ $permission->name }}"
                                               {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>

                                        <label class="form-check-label">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach

                                </div>

                                @endforeach

                            </div>

                            <div class="text-end mt-3">
                                <button class="btn btn-success">Save</button>
                            </div>

                        </div>
                    </div>

                </form>

                <!-- Delete Role -->
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this role?')">
                        Delete Role
                    </button>
                </form>

            </div>
            @endforeach

        </div>
    </div>

</div>
</div>

<!-- ADD ROLE MODAL -->
<div class="modal fade" id="add_role">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5>Add Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label>Role Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection