<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{$title}}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset("css/styles.css")}}" rel="stylesheet" />
        <!-- Dropify CSS -->
        <link href="{{asset("dropify-master/dist/css/dropify.min.css")}}" rel="stylesheet" />
        <!-- Sharetastic CSS -->
        <link href="{{asset("sharetastic-master/dist/sharetastic.css")}}" rel="stylesheet" />

        <!-- Font Awesome 5 icons CSS -->
        <link href="{{asset("fontawesome-free-5.6.1-web/css/all.css")}}" rel="stylesheet" />

        <!-- Datatables JS Files -->
        <link href="{{asset("DataTables/datatables.min.css")}}" rel="stylesheet"/>

        <!-- Minimal jQuery Social Share Button Plugin For jQuery - Sharetastic CSS Files -->
        <link href="{{asset("sharetastic-master/dist/sharetastic.css")}}" rel="stylesheet"/>

        <!-- Minimal jQuery jsSocials Social Share Button Plugin JS Files -->
        <link href="{{asset("jssocials-1.4.0/dist/jssocials.css")}}" rel="stylesheet"/>
        <!--<link href="{{asset("jssocials-1.4.0/dist/jssocials-theme-classic.css")}}" rel="stylesheet"/>-->
        <!--<link href="{{asset("jssocials-1.4.0/dist/jssocials-theme-flat.css")}}" rel="stylesheet"/>-->
        <link href="{{asset("jssocials-1.4.0/dist/jssocials-theme-minima.css")}}" rel="stylesheet"/>
        <!--<link href="{{asset("jssocials-1.4.0/dist/jssocials-theme-plain.css")}}" rel="stylesheet"/>-->

        <!-- My CSS Files -->
        <link href="{{asset("css/mystyle.css")}}" rel="stylesheet"/>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Leno Files</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    @auth
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item mx-0 mx-lg-1"><a href="/" class="nav-link py-3 px-0 px-lg-3 rounded">Home</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a href="/users/upload_file" class="nav-link py-3 px-0 px-lg-3 rounded">Upload File</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a href="/users/files" class="nav-link py-3 px-0 px-lg-3 rounded">Manage Files</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a href="/users/profile" class="nav-link py-3 px-0 px-lg-3 rounded">Profile</a></li>
                            <li class="nav-item mx-0 mx-lg-1">
                                <form class="" method="POST" action="/logout">
                                    @csrf
                                    <button class="nav-link py-3 px-0 px-lg-3 rounded" id="navbar-login-link" type="submit">
                                        LOGOUT
                                    </button>
                                </form>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item mx-0 mx-lg-1"><a href="/" class="nav-link py-3 px-0 px-lg-3 rounded">Home</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a href="/users/upload_file" class="nav-link py-3 px-0 px-lg-3 rounded">Upload File</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a href="/register" class="nav-link py-3 px-0 px-lg-3 rounded">Sign Up</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a href="/login" class="nav-link py-3 px-0 px-lg-3 rounded">Login</a></li>
                        </ul>
                    @endauth
                </div>
            </div>
        </nav>
        
        @yield("content")
        
        <!-- Copyright Section-->
        <!--<div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>
                    Copyright &copy; Leno Files 
                    @if(date("Y") <= 2023)
                        2023
                    @else
                        2023 - @php date("Y") @endphp
                    @endif
                </small>
            </div>
        </div>-->
        <!-- Portfolio Modals-->
        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Log Cabin</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cabin.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Tasty Cake</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cake.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Circus Tent</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/circus.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-labelledby="portfolioModal4" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Controller</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/game.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" aria-labelledby="portfolioModal5" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Locked Safe</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/safe.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" aria-labelledby="portfolioModal6" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Submarine</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/submarine.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset("js/scripts.js")}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <!-- Font Awesome 5 Icons cdn -->
        <script src="https://kit.fontawesome.com/35e84951c1.js" crossorigin="anonymous"></script>

        <!-- jQuery -->
        <script src="{{asset("jquery/jquery-3.6.4.min.js")}}" type="text/javascript"></script>
        <!-- Dropify Js -->
        <script src="{{asset("dropify-master/dist/js/dropify.min.js")}}" type="text/javascript"></script>
        <!-- Share Buttons plugin Js -->
        <!--<script src="{{asset("sharetastic-master/dist/sharetastic.js")}}" type="text/javascript"></script>-->

        <!-- Datatables JS Files -->
        <script src="{{asset("DataTables/datatables.min.js")}}"></script>

        <!-- Minimal jQuery Social Share Button Plugin For jQuery - Sharetastic JS Files -->
        <script src="{{asset("sharetastic-master/dist/sharetastic.js")}}"></script>

        <!-- Minimal jQuery jsSocials Social Share Button Plugin JS Files -->
        <script src="{{asset("jssocials-1.4.0/dist/jssocials.min.js")}}"></script>

        <!-- For File Uploads -->
        <script type="text/javascript">
            // jQuery document ready
            $(document).ready(function() {
                $(".dropify").dropify(); //to give file inputs styling and all

                $(".my-datatable").DataTable();

                //$(".delete-file-form").on

                $('.sharetastic').sharetastic({
                    feed: {
                        //facebook:true,
                        //<a href="https://www.jqueryscript.net/tags.php?/twitter/">twitter</a>:true,
                        linkedin:true,
                        email:true
                    }
                }); //Initialize the plugin

                //$(".share-socials").jsSocials("option", "showCount", false);
                /*{
    url: "http://www.google.com",
    text: "Google Search Page",
    showLabel: false,
    showCount: "inside",
    shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
}*/

                //var currentUrl = window.location.href;

                var current_href = $(location).attr('href');
                var current_title = $(document).attr('title');

                $(".share-socials").jsSocials({
                    //url: currentUrl,
                    url: current_href,
                    //text: "Google Search Page",
                    text: current_title,
                    showLabel: false,
                    //showCount: "inside",
                    showCount: false,
                    //shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
                    shares: [
                        {
                            share: "facebook",
                            logo: "https://png.pngtree.com/png-vector/20221018/ourmid/pngtree-facebook-social-media-icon-png-image_6315968.png"
                        },
                        {
                            share: "twitter",
                            logo: "https://png.pngtree.com/png-clipart/20221019/original/pngtree-twitter-social-media-round-icon-png-image_8704823.png"
                        },
                        {
                            share: "googleplus",
                            logo: "https://www.freeiconspng.com/thumbs/google-plus-logo/google-plus-logo-4.png"
                        },
                        {
                            share: "linkedin",
                            logo: "https://static.vecteezy.com/system/resources/previews/018/930/587/original/linkedin-logo-linkedin-icon-transparent-free-png.png"
                            
                        },
                        {
                            share: "pinterest",
                            logo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/Pinterest.svg/768px-Pinterest.svg.png"
                        },
                        {
                            share: "stumbleupon",
                            logo: "https://cdn0.iconfinder.com/data/icons/shift-logotypes/32/StumbleUpon-512.png" //creative common license
                        },
                        {
                            share: "whatsapp",
                            //logo: "https://static.vecteezy.com/system/resources/previews/018/819/298/non_2x/whatsapp-icon-transparent-free-png.png"
                            logo: "https://static.vecteezy.com/system/resources/previews/018/819/298/non_2x/whatsapp-icon-transparent-free-png.png"
                        }
                    ]
                });

                $(".delete-file-form").submit(function (e) {
                    e.preventDefault();
                    //var formId = this.id;  // "this" is a reference to the submitted form

                    if(confirm("Are you sure you want to delete this file?")) {
                        //
                        // Simulate an HTTP redirect:
                        //to the delete page
                        //window.location.replace(url);

                        // Now submit it 
                        // Don't use $(this).submit() FFS!
                        // You'll never leave this function & smash the call stack! :D
                        e.currentTarget.submit();
                    }
                });
            });
        </script>
    </body>
</html>
