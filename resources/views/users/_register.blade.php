@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">

                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" action="/users/store" class="register-login-form">
                        @csrf
                        <div class="mb-3 text-center">
                            <h3>Create an Account</h3>
                        </div>
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="{{old("firstname")}}" required/>

                            @error("firstname")
                                <!--<p class="text-red-500 text-xs mt-1">{{$message}}</p>-->
                                <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" value="{{old("lastname")}}" required/>

                            @error("lastname")
                                <!--<p class="text-red-500 text-xs mt-1">{{$message}}</p>-->
                                <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{old("email")}}" required/>

                            @error("email")
                                <!--<p class="text-red-500 text-xs mt-1">{{$message}}</p>-->
                                <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{old("password")}}" required/>

                            @error("password")
                                <!--<p class="text-red-500 text-xs mt-1">{{$message}}</p>-->
                                <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{old("password_confirmation")}}" required/>

                            @error("password_confirmation")
                                <!--<p class="text-red-500 text-xs mt-1">{{$message}}</p>-->
                                <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <p>Already have an account? <a href="/login">Login</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
                
            </div>
        </div>
    </section>
@endsection