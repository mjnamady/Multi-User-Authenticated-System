@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          @if(Auth::user()->can('property.add'))
            <a href=" {{route('add.type')}} " class="btn btn-inverse-success">Add Property Type</a>
          @endif
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Property Types</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Type Name</th>
            <th>Type Icon</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($allTypes as $key => $type)
          <tr>
            <td> {{$key+1}} </td>
            <td> {{$type->type_name}} </td>
            <td> {{$type->type_icon}} </td>
            <td>
              @if(Auth::user()->can('property.edit'))
                <a href=" {{route('edit.type', $type->id)}} " class="btn btn-inverse-warning">Edit</a>
              @endif
              @if(Auth::user()->can('property.delete'))
                <a href=" {{route('delete.type', $type->id)}} " class="btn btn-inverse-danger" id="delete">Delete</a>
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
    </div>

</div>

@endsection