@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center text-center">

                <div class="col-md-12 col-lg-12 mt-5">
                    
                    @if(session()->has('success'))
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-success">
                                    {{session()->get("success")}}
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    @elseif(session()->has('error'))
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-danger">
                                    {{session()->get("error")}}
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    @endif
                    
                    <!-- Portfolio Section Heading-->
                    <img src="{{asset("images/upload-folder-document-file-upload-upload-document-icon-27.png")}}" class="img-fluid" alt="Upload file image">
                    <h2>Easily upload and share files to anyone</h2>
                    <a href="/users/upload_file" class="btn btn-primary btn-xl">UPLOAD</a>
                </div>
                
            </div>
        </div>
    </section>
@endsection