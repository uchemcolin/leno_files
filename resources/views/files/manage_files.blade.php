@extends("layout", ['title' => $title])

@section("content")
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center text-center">

                <div class="col-md-3 col-lg-3 mt-5"></div>
                <div class="col-md-6 col-lg-6 mt-5">
                    <!-- Portfolio Section Heading-->
                    <h3>Your Files</h3>
                    <!--<form class="row row-cols-lg-auto g-3 align-items-center" action="/files/manage_files" method="POST">-->
                    <form class="align-items-center" action="/users/files" method="POST">
                        @csrf
                        <div class="col-12">
                            <!--<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>-->
                            <label class="" for="search">Search...</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Search by name, file type, size, etc">
                                <div class="input-group-text">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!--<div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>-->
                    </form>
                </div>
                <div class="col-md-3 col-lg-3 mt-5"></div>
                
            </div>
            <div class="row justify-content-center">

                <div class="col-md-12 col-lg-12 mt-5 text-center">
                    <!-- Portfolio Section Heading-->
                    <!--<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Leno Files</h2>-->
                    <!--<i class="fa-solid fa-file-arrow-up fa-5x"></i>-->
                    <!--<img src="{{asset("images/upload-folder-document-file-upload-upload-document-icon-27.png")}}" class="img-fluid" alt="Upload file image">
                    <h2>Easily upload and share files to anyone</h2>
                    <a href="/files/create" class="btn btn-primary btn-xl">UPLOAD</a>-->

                    @if(count($files) == 0)
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{session()->get("success")}}
                                    </div>
                                @elseif(session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{session()->get("error")}}
                                    </div>
                                @endif
                                @if($search != "")
                                    <div class="alert alert-info"><strong>No file was found matching "{{$search}}"</div>
                                @else
                                    <div class="alert alert-info"><strong>You current have no file uploaded</strong></div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    @else
                        @if($search != "")
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{session()->get("success")}}
                                        </div>
                                    @elseif(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{session()->get("error")}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="alert alert-info"><strong>{{count($files)}} file(s) were found matching "{{$search}}"</strong></div>
                                </div>
                            </div>
                            
                        @endif

                        <table class="table table-hover my-datatable">

                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">S/N</th>
                                    <th scope="col" class="text-center">NAME</th>
                                    <!--<th scope="col" class="text-center">TYPE</th>-->
                                    <th scope="col" class="text-center">SIZE</th>
                                    <th scope="col" class="text-center">UPLOADED</th>
                                    <th scope="col" class="text-center">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$file["name"]}}</td>
                                        <!--<td>{{strtoupper($file["type"])}}</td>-->
                                        <!--<td>{{round($file->size, 5)}}MB</td>-->
                                        <td>{{$file->size}}MB</td>
                                        <td>
                                            <?php
                                                //echo date("d M, Y", strtotime($payment["created_at"]));
                                                echo date("d M, Y", strtotime($file["created_at"]));
                                                //echo $payment["created_at"];
                                            ?>
                                        </td>
                                        <td class="text-center">    
                                            <a href="/files/view_file/{{$file["id"]}}" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-eye"></i></a>

                                            <!--<form method="POST" action="/users/delete_file/{{$file->id}}" onsubmit="showWarning(event, this.form)" class="delete-file-form">-->
                                            <form method="POST" action="/users/{{$file->id}}" class="delete-file-form">
                                                @csrf
                                                @method("DELETE")
                                                <!--<button class="btn btn-danger" onclick="showWarning(event)">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>-->

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>

                                                
                                            </form>

                                            <!--<?php #$url = "/users/delete_key/".$company_key["id"]; ?>
                                            <button class="btn btn-danger" onclick="showWarning('<?php #echo $url; ?>')">Delete</button>
                                            <script type="text/javascript">
                                                function showWarning(url_php) {
                                                    var url = url_php;
                                                    //Show a confirm message before deleting the staff
                                                    if(confirm("Are you sure you want to delete this key?")) {
                                                        //
                                                        // Simulate an HTTP redirect:
                                                        //to the delete page
                                                        window.location.replace(url);
                                                    }
                                                }
                                            </script>-->
                                            <?php
                                                //echo date("d M, Y", strtotime($payment["created_at"]));
                                                
                                                //echo date("d M, Y", strtotime($file["created_at"]));
                                                
                                                //echo $payment["created_at"];
                                            ?>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                
            </div>
        </div>
    </section>
@endsection