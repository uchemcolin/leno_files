@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center text-center">

                <div class="col-md-12 col-lg-12 mt-5">
                    <!-- Portfolio Section Heading-->
                    <h3>Profile <a href="/users/edit_profile" class="btn btn-primary btn-sm">Edit <i class="fas fa-user-edit"></i></a></h3>
                </div>
                <div class="col-md-3 col-lg-3 mt-5"></div>
                <div class="col-md-6 col-lg-6 mt-5">
                        <h4>Account Details</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>Email</td>
                                <td>{{$user_details["email"]}}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <h4>Individual Information</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>First Name</td>
                                    <td>{{$user_details["firstname"]}}</td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>{{$user_details["lastname"]}}</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="col-md-3 col-lg-3 mt-5"></div>
                
            </div>
        </div>
    </section>
@endsection