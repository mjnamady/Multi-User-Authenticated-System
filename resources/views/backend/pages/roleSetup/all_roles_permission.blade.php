@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">All Role's Permissions</h6>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Role Name</th>
            <th>Permissions</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($roles as $key => $role)
          <tr>
            <td> {{$key+1}} </td>
            <td> {{$role->name}} </td>
            <td>
                @foreach ($role->permissions as $prmtn)
                    <span class="badge bg-danger">{{ $prmtn->name }}</span>
                @endforeach
            </td>
            <td>
                <a href=" {{route('admin.edit.role', $role->id)}} " class="btn btn-inverse-warning">Edit</a>
                <a href=" {{route('admin.delete.role', $role->id)}} " class="btn btn-inverse-danger" id="delete">Delete</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>
</div>

@endsection