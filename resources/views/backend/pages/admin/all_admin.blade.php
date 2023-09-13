@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href=" {{route('add.role')}} " class="btn btn-inverse-success">Add Admin</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">All Admins</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>S/N</th>
            <th>IMAGE</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>ROLE</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($allAdmin as $key => $admin)
          <tr>
            <td> {{$key+1}} </td>
            <td> <img src="{{ (!empty($admin->photo) ? url('uploads/admin_images/'.$admin->photo) : url('uploads/no_image.jpg')) }} " alt=" {{$admin->username}} "> </td>
            <td> {{ $admin->name }} </td>
            <td> {{ $admin->email }} </td>
            <td> {{ $admin->phone }} </td>
            <td> {{ $admin->role }} </td>
            <td>
                <a href=" {{route('edit.role', $admin->id)}} " class="btn btn-inverse-warning" title="Edit"><i data-feather="edit"></i></a>
                <a href=" {{route('delete.role', $admin->id)}} " class="btn btn-inverse-danger" id="delete" title="Delete"> <i data-feather="trash-2"></i> </a>
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