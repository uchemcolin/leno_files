@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">

                <div class="col-md-12 col-lg-12 mt-5 text-center">
                    <!-- Portfolio Section Heading-->
                    <h3>Edit Your Profile  <a href="/users/profile" class="btn btn-primary btn-sm">Go Back <i class="fas fa-arrow-left"></i></a></h3>
                </div>
                <div class="col-md-3 col-lg-3 mt-5"></div>
                <div class="col-md-6 col-lg-6 mt-5">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get("success")}}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {{session()->get("error")}}
                        </div>
                    @endif
                    <form method="POST" action="/users/update_profile_name">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your first name" value="{{$user_details["firstname"]}}" required/>
                        </div>
                        @error("firstname")
                            <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your last name" value="{{$user_details["lastname"]}}" required/>
                        </div>
                        @error("lastname")
                            <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                        @enderror
                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-primary btn-block" id="update-email-btn">UPDATE</button>
                        </div>
                    </form>
                    <hr>
                    <form method="POST" action="/users/update_profile_email">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" value="{{$user_details["email"]}}" required/>
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        @error("email")
                            <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                        @enderror
                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-primary btn-block" id="update-email-btn">UPDATE</button>
                        </div>
                    </form>
                    <hr>
                    <form method="POST" action="/users/update_profile_password">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Old Password</label>
                            <input type="password" class="form-control" name="old_password" id="old-password" placeholder="Enter your old password" value="{{old("old_password")}}" required/>
                            <small id="passwordHelp" class="form-text text-muted">At least 6 characters in length.</small>
                        </div>
                        @error("old_password")
                            <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your new password" value="{{old("new_password")}}" required>
                            <small id="passwordHelp" class="form-text text-muted">At least 6 characters in length.</small>
                        </div>
                        @error("new_password")
                            <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Retype your password"  value="{{old("password_confirmation")}}" required/>
                        </div>
                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-primary btn-block" id="update-password-btn">UPDATE</button>
                        </div>
                        @error("password_confirmation")
                            <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                        @enderror
                    </form>
                </div>
                <div class="col-md-3 col-lg-3 mt-5"></div>
                
            </div>
        </div>
    </section>
@endsection