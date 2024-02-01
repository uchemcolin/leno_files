@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">

                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" action="/users/send_password" class="register-login-form">
                        @csrf
                        <div class="mb-3 text-center">
                            <h3>Forgot Password</h3>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{old("email")}}" required/>

                            @error("email")
                                <!--<p class="text-red-500 text-xs mt-1">{{$message}}</p>-->
                                <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <p>Now remember your password? <a href="/login">Login</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
                
            </div>
        </div>
    </section>
@endsection