@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center text-center">

                <div class="col-md-3 col-lg-3"></div>
                <div class="col-md-6 col-lg-6">
                    <form method="POST" action="/users/upload_file" enctype="multipart/form-data" class="register-login-form">
                        @csrf
                        <div class="mb-3 text-center">
                            <h3>Upload File</h3>
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
                            <label for="file" class="form-label">File (2MB Max)</label>
                            <input type="file" class="form-control dropify" name="file" id="file" required/>

                            @error("file")
                                <div class="alert alert-danger text-xs mt-1">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 col-lg-3"></div>
            </div>
        </div>
    </section>
@endsection