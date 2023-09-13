@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>

<div class="page-content">

   
    <div class="row profile-body">
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
                <div class="card">
                  <div class="card-body">
    
                        <h6 class="card-title">Add Role In Permission</h6>

                        <form id="myForm" method="POST" action=" {{route('role.permission.store')}} " class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Role Name</label>
                                <select class="form-select" name="role_id" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group Name</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                <label class="form-check-label" for="checkDefaultmain">Permission All</label>
                            </div>
                            @foreach ($permission_groups as $group)
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="checkDefault">
                                        <label class="form-check-label" for="checkDefault">{{$group->group_name}}</label>
                                    </div>
                                </div>
                              
                                <div class="col-9">
                                @php
                                    $permissions = App\Models\User::gerPermissionsByGroupName($group->group_name);
                                @endphp
                                @foreach($permissions as $permission)
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="permission[]" class="form-check-input" id="checkDefault{{ $permission->id }}" value="{{ $permission->id }}">
                                        <label class="form-check-label" for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                
                                    </div>
                                @endforeach
                                <br>
                                </div>
                            </div> <!--End row -->
                            @endforeach
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
    
                  </div>
                </div>
                        </div>
      </div>
      <!-- middle wrapper end -->
    </div>
        </div>

        <script>
            $('#checkDefaultmain').click(function(){
                if($(this).is(':checked')) {
                    $('input[type=checkbox]').prop('checked', true);
                } else {
                    $('input[type=checkbox]').prop('checked', false);
                }
            });
        </script>

@endsection