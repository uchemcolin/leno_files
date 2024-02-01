@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">

                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <strong>Undergoing maintenance. Please check back later</strong>
                    </div>
                    <!--<form method="POST" action="/send_password" class="register-login-form">
                        @csrf
                        <div class="mb-3 text-center">
                            <h3>Forgot Password</h3>
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
                            <label for="email" class="form-label">Your Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{old("email")}}" required/>

                            @error("email")
                                <?php #<!--<p class="text-red-500 text-xs mt-1">{{$message}}</p>--> ?>
                                <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <p>Now remember your password? <a href="/login">Login</a></p>
                    </form>-->
                </div>
                <div class="col-md-3"></div>
                
            </div>
        </div>
    </section>
@endsection