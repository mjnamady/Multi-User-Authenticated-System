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
    
                        <h6 class="card-title">Edit Permission</h6>

                        <form id="myForm" method="POST" action=" {{route('update.permission')}} " class="forms-sample">
                            @csrf
                            <input type="hidden" value="{{$permission->id}}" name="id">
                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control" value="{{$permission->name}}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Group Name</label>
                                <select class="form-select" name="group_name" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group Name</option>
                                    <option value="type" {{ $permission->group_name == 'type' ? 'selected' : '' }}>Property Type</option>
                                    <option value="state" {{ $permission->group_name == 'state' ? 'selected' : '' }}>State</option>
                                    <option value="amenities" {{ $permission->group_name == 'amenities' ? 'selected' : '' }}>Amenities</option>
                                    <option value="property" {{ $permission->group_name == 'property' ? 'selected' : '' }}>Property</option>
                                    <option value="history" {{ $permission->group_name == 'history' ? 'selected' : '' }}>Package History</option>
                                    <option value="message" {{ $permission->group_name == 'message' ? 'selected' : '' }}>Property Message</option>
                                    <option value="testimonials" {{ $permission->group_name == 'testimonials' ? 'selected' : '' }}>Testimonials</option>
                                    <option value="agent" {{ $permission->group_name == 'agent' ? 'selected' : '' }}>Manage Agent</option>
                                    <option value="category" {{ $permission->group_name == 'category' ? 'selected' : '' }}>Bloge Category</option>
                                    <option value="posts" {{ $permission->group_name == 'posts' ? 'selected' : '' }}>Blog Post</option>
                                    <option value="comments" {{ $permission->group_name == 'comments' ? 'selected' : '' }}>Blog Comment</option>
                                    <option value="smtp" {{ $permission->group_name == 'smtp' ? 'selected' : '' }}>SMTP Setting</option>
                                    <option value="site" {{ $permission->group_name == 'site' ? 'selected' : '' }}>Site Setting</option>
                                    <option value="rols" {{ $permission->group_name == 'rols' ? 'selected' : '' }}>Role & Permission</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Update Permission</button>
                        </form>
    
                  </div>
                </div>
                        </div>
      </div>
      <!-- middle wrapper end -->
    </div>
        </div>

@endsection