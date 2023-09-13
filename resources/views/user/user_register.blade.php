@extends('user.template')
@section('user')

<div id="tab-1" class="col-md-6 text-center mx-auto mt-1 tab-pane fade show p-0 active">
    <div class="wow fadeInUp mb-4" data-wow-delay="0.5s">
       <h2>Register</h2>
        <form>
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        <label for="uid">Name</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        <label for="uid">Username</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        <label for="uid">Email</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Your Email">
                        <label for="password">Password</label>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">login</button>
                </div>
            </div>
        </form>
    </div>
    Already have an account? <a href="{{route('user.login')}}">Sign In</a>
</div>

@endsection
