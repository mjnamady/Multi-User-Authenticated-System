@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

   
    <div class="row profile-body">
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
                <div class="card">
                  <div class="card-body">
    
                        <h6 class="card-title">Add Admin</h6>

                        <form method="POST" action=" {{route('update.admin', $admin->id)}} " class="forms-sample">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('admin_name') is-invalid @enderror" value="{{$admin->name}}">
                                @error('admin_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Username</label>
                                <input type="text" name="uid" class="form-control @error('admin_uid') is-invalid @enderror" value="{{$admin->username}}">
                                @error('admin_uid')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$admin->email}}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Phone</label>
                                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$admin->phone}}">
                                @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$admin->address}}">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <select class="form-select" name="roles" id="exampleFormControlSelect1">
                                <option selected="" disabled="">Select Admin's Role</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}" {{$admin->hasRole($role) ? 'selected' : ''}} >{{$role->name}}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-primary mt-2">Add </button>
                        </form>
    
                  </div>
                </div>
                        </div>
      </div>
      <!-- middle wrapper end -->
    </div>
        </div>
@endsection