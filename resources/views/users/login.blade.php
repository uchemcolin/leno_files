@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">

                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" action="/users/authenticate" class="register-login-form">
                        @csrf
                        <div class="mb-3 text-center">
                            <h3>Sign into your Account</h3>
                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{session()->get("success")}}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {{session()->get("error")}}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{old("email")}}" required/>

                            @error("email")
                                <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{old("password")}}" required>

                            @error("password")
                                <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <p>Don't have an account? <a href="/register">Sign Up</a></p>
                        <p>Can't remember your password? <a href="/forgot_password">Forgot Password</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
                
            </div>
        </div>
    </section>
@endsection