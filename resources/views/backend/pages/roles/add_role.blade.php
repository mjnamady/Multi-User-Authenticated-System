@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

   
    <div class="row profile-body">
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
                <div class="card">
                  <div class="card-body">
    
                        <h6 class="card-title">Add Role</h6>

                        <form id="myForm" method="POST" action=" {{route('store.role')}} " class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-inverse-warning me-2">Add Role</button>
                        </form>
    
                  </div>
                </div>
                        </div>
      </div>
      <!-- middle wrapper end -->
    </div>
        </div>

@endsection