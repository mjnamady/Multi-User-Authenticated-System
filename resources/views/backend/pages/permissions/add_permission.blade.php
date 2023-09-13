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
    
                        <h6 class="card-title">Add Permission</h6>

                        <form id="myForm" method="POST" action=" {{route('store.permission')}} " class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="exampleInputUsername1" class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Group Name</label>
                                <select class="form-select" name="group_name" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group Name</option>
                                    <option value="type">Property Type</option>
                                    <option value="state">State</option>
                                    <option value="amenities">Amenities</option>
                                    <option value="property">Property</option>
                                    <option value="history">Package History</option>
                                    <option value="message">Property Message</option>
                                    <option value="testimonials">Testimonials</option>
                                    <option value="agent">Manage Agent</option>
                                    <option value="category">Bloge Category</option>
                                    <option value="posts">Blog Post</option>
                                    <option value="comments">Blog Comment</option>
                                    <option value="smtp">SMTP Setting</option>
                                    <option value="site">Site Setting</option>
                                    <option value="rols">Role & Permission</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Add Permission</button>
                        </form>
    
                  </div>
                </div>
                        </div>
      </div>
      <!-- middle wrapper end -->
    </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        amenity_name: {
                            required : true,
                        }, 
                        
                    },
                    messages :{
                        amenity_name: {
                            required : 'Please Enter Amenity Name',
                        }, 
                         
        
                    },
                    errorElement : 'span', 
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
            
        </script>
@endsection