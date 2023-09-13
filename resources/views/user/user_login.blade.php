@extends('user.template')
@section('user')

<div class="col-md-6 text-center mx-auto mt-4">
    <div class="wow fadeInUp mb-4" data-wow-delay="0.5s">
       <h2>Sign In</h2>
        <form method="post" action="{{route('login')}}">
            @csrf
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="login" id="uid" placeholder="Email/Username">
                        <label for="uid">Email/Username</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Your Email">
                        <label for="password">Password</label>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Sign In</button>
                </div>
            </div>
        </form>
    </div>
    Don't have an account yet!? <a href="{{route('user.register')}}">Register</a>
</div>

@endsection
