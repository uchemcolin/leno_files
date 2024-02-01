@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center text-center">

                <div class="col-md-12 col-lg-12 mt-5">
                    <!-- Portfolio Section Heading-->
                    <h3>Your Details  <a href="/users/profile" class="btn btn-primary btn-sm">Go Back <i class="fas fa-arrow-left"></i></a></h3>
                </div>
                <div class="col-md-3 col-lg-3 mt-5"></div>
                <div class="col-md-6 col-lg-6 mt-5">
                    @foreach($user_details as $user_d)
                        <form method="POST" action="/users/update_profile_email">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" value="{{$user_d["email"]}}">
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="update-email-btn">UPDATE</button>
                        </form>
                        <hr>
                        <form method="POST" action="/users/update_profile_password">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="old-password" placeholder="Enter your old password" value="{{old("old_password")}}" />
                                <small id="passwordHelp" class="form-text text-muted">At least 6 characters in length.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new-password" placeholder="Enter your new password" value="{{old("new_password")}}">
                                <small id="passwordHelp" class="form-text text-muted">At least 6 characters in length.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="confirm-password" placeholder="Retype your password"  value="{{old("password_confirmation")}}" />
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="update-password-btn">UPDATE</button>
                        </form>
                    @endforeach
                </div>
                <div class="col-md-3 col-lg-3 mt-5"></div>
                
            </div>
        </div>
    </section>
@endsection