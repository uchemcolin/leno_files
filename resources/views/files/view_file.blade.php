@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center text-center">

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
                    <!-- Portfolio Section Heading-->
                    <img src="{{asset("images/file-icon.png")}}" class="img-fluid" alt="File icon image" width="300px">
                    <br/>
                    <br/>
                    <h5>File Name: {{$file->name}}</h5>
                    <!--<div>File Size: {{round($file->size, 5)}}MB</div>-->
                    <div>File Size: {{$file->size}}MB</div>
                    <!--<div>File Type: {{strtoupper($file->type)}}</div>-->
                    <div class="share-socials"></div>
                    <div>
                        <a href="{{asset("storage/files/$file->name")}}" target="_blank" class="btn btn-primary"> Download <i class="fa fa-download"></i></a>
                        @auth
                            @if($file->user_id == auth()->id())
                                <form method="POST" action="/users/{{$file->id}}" class="delete-file-form">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete 
                                        <i
                                            class="fa-solid fa-trash-can"
                                        ></i>
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 mt-5"></div>
            </div>
        </div>
    </section>
@endsection