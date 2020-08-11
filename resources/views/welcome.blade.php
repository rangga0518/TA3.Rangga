<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}">
    <title>Dream Restaurant &mdash; Food Specialty </title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('ela/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('ela/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('resto/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('ela/css/style.css') }}" rel="stylesheet">

    <!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
    
    <style type="text/css">
        @media (min-width: 1024px){
            .page-wrapper {
                margin-left: 0px;
            }
        }
        .footer{
            left: 0;
        }
        #about .carousel-indicators li{
            background-color: rgba(0,0,0,.5)
        }
        #about .carousel-indicators li.active{
            background-color: rgba(0,0,0,.2)
        }
    </style>
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <!-- Carousel -->
        <div class="row">
            <div class="col-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="container">
                        @foreach ($restoran as $restoran)
                      <div class="carousel-caption fadeInUp animated" style="bottom:0;top:200px">
                        <h2 class="display-1" style="color:#fff;">{{$restoran->nama_restoran}}</h2>
                        <p class="h2" style="color: #ddd;padding-top:20px;padding-bottom: 20px">A Restaurant </p>
                      </div>
                      @endforeach
                    </div>
                    <div class="carousel-item active" style="height: 100vh">
                      <img style="filter: brightness(40%); width:100%;" class="first-slide" src="resto/images/dinner1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item" style="height: 100vh">
                      <img style="filter: brightness(40%); width:100%;" class="second-slide" src="resto/images/carlo drink.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item" style="height: 100vh">
                      <img style="filter: brightness(40%); width:100%;" class="third-slide" src="resto/images/sushi1.jpg" alt="Third slide">
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- Carousel -->
        <!-- header header  -->
        <div class="header" style="top:0; width: 100%;">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL('/pelanggan') }}">
                        <!-- Logo icon -->
                        <b><img src="{{asset('images/logo.png')}}" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="dark-logo">Dream Restaurant</span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item">
                            <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#hidangan">Hidangan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reservasi">Reservasi</a>
                        </li>
                        {{-- @if($islogin['login']=='pelanggan'||$islogin['login']=='pegawai')
                        @else --}}
                        <li class="nav-item">
                            <a id="login" class="nav-link" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reservasi">Sign Up</a>
                        </li>
                        {{-- @endif --}}
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <div id="about">
            <div class="row" style="background-image:url({{ asset('resto/images/wood_1.png')}});">
              <div class="col-md-6">
                <img class="img-fluid" src="{{ asset('resto/images/dinner1.jpg')}}">
              </div>
              @foreach ($about as $about)
              <div class="col-md-6" style="padding:30px 50px;">
                <h2 class="display-4" style="color:#fff;padding-bottom: 10px;padding-top: 20px">{{$about->nama_about}}</h2>
                <p class="lead" style="color:#a99c92;font-weight: 300">{{$about->text_about}}</p>
              </div>
              @endforeach
            </div>
        </div>
        <section class="services-section spad">
            <div class="container">
                <div class="section-title">
                    <i class="flaticon-022-tray"></i>
                    <h2>Our Services</h2>
                </div>
                <div class="row services">
                    <div class="col-lg-3 col-md-6 service-item">
                        <i class="flaticon-005-coffee-1"></i>
                        <h3>Breakfast</h3>
                        <p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 service-item">
                        <i class="flaticon-016-pancake"></i>
                        <h3>Brunch</h3>
                        <p>Scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 service-item">
                        <i class="flaticon-008-soup"></i>
                        <h3>Lunch</h3>
                        <p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 service-item">
                        <i class="flaticon-032-hamburger"></i>
                        <h3>Dinner</h3>
                        <p>Aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendreri.</p>
                    </div>
                </div>
            </div>
        </section>
        <div id="kata" class="row">
            <div class="col-12">
                <div class="section-title">
                    <i class="flaticon-020-ice-cream"></i>
                    <h2>Testimonials</h2>
                </div>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 300px">
                      <div class="container">
                          @foreach ($coment as $coment)
                        <div class="carousel-caption">
                          <h3 class="display-4" style="color:#5e493a;font-size: 40px ;">{!!$coment->description!!}</h3>
                          {{-- "Makan adalah hobiku. Dream Restaurant mengirim hobiku ke tingkatan selanjutnya." --}}
                          {{-- <p class="h4" style="color: gray; padding-top:20px;padding-bottom: 20px">{{$coment->user}}</p> --}}
                        </div>
                        @endforeach
                      </div>
                    </div>
                    {{-- <div class="carousel-item" style="height: 300px">
                      <div class="container">
                        <div class="carousel-caption">
                          <h3 class="display-1" style="color:#5e493a;font-size: 40px ;">"Pelayanannya ramah, tempatnya bersih, mantap deh pokoknya."</h3>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item" style="height: 300px">
                      <div class="container">
                        <div class="carousel-caption">
                          <h3 class="display-1" style="color:#5e493a;font-size: 40px ;">"Websitenya sangat bagus, apalagi restorannya, MANTAP."</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>                
        </div> --}}

        <div id="hidangan" style="background-image:url({{ asset('resto/images/wood_1.png')}});">
            <div class="row">
                <div class="col-md-12" style="padding: 100px 0 50px 0">
                    <h1 class="display-4" style="color:#fff;text-align: center">Hidangan</h1>
                    <div class="container" style="margin-top: 100px">
                        <div class="row">

                            <?php
                                $i = 1;
                            ?>
                            @foreach($hidangan as $hidangan)
                            <div class="col-md-6">
                                <div class="row">

                                    <div class="col-md-6" style="height: 200px;"><img src="{{Storage::url($hidangan->foto_hidangan)}}" alt="{{$hidangan->nama_hidangan}}" class="img-responsive" max-width="200" max-height="200">
                                    </div>
                                    <div class="col-md-6" style="background: @if($i==1||$i==4||$i==5) #f5f5f5 @else #faebcd @endif
                                    ;padding: 30px 20px">
                                        <div style="position:absolute;height:1px;width:1px;border:15px solid transparent;border-right: 15px solid @if($i==1||$i==4||$i==5) #f5f5f5 @else #faebcd @endif;left:-30px;top:80px"></div>
                                        <h3 style="text-align: center;color: #444;line-height: 200%"><span style="border-bottom:2px solid #fb6e14">{{$hidangan->nama_hidangan}}</span></h3>
                                        <p class="display-4" style="margin-top:30px;font-size: 40px; text-align: center;color: #5e493a">IDR {{$hidangan->harga_hidangan}}</p>
                                    </div>
                                </div>
                            </div>


                            <?php
                                $i+=1;
                            ?>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start team Area -->
			{{-- <section class="team-area section-gap" id="chefs">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Meet Our Qualified Chefs</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row justify-content-center d-flex align-items-center">
						<div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/t1.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Ethel Davis</h4>
							    <p>Managing Director (Sales)</p>									    	
						    </div>
						</div>
						<div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/t2.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Rodney Cooper</h4>
							    <p>Creative Art Director (Project)</p>			    	
						    </div>
						</div>	
						<div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/t3.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Dora Walker</h4>
							    <p>Senior Core Developer</p>			    	
						    </div>
						</div>	
						<div class="col-md-3 single-team">
						    <div class="thumb">
						        <img class="img-fluid" src="img/t4.jpg" alt="">
						        <div class="align-items-center justify-content-center d-flex">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
						        </div>
						    </div>
						    <div class="meta-text mt-30 text-center">
							    <h4>Lena Keller</h4>
							    <p>Creative Content Developer</p>			    	
						    </div>
						</div>																		
					</div>
				</div>	
			</section> --}}
			<!-- End team Area -->
        <div id="reservasi" class="container">
            <h2 class="display-4" style="text-align: center;color:#5e493a;padding:50px 0;">Reservasi</h2>

            <div class="row">
                <div class="col-md-6">
                    <h3 class="display-4" style="font-size: 30px;margin-bottom: 30px">Contact Info</h3>
                    <ul>
                        {{-- @foreach ($restoran as $restoran) --}}
                        <li style="padding-left: 50px;margin-bottom: 10px">
                            <i class="icon-home" style="position: absolute;left: 20px"></i>
                            {{$restoran->alamat_restoran}}
                            {{-- Jalan Raya Raden Saleh no. 17X, <br> Karang Tengah, Kota Tangerang --}}
                        </li>    
                        {{-- @endforeach --}}
                        
                        <li style="padding-left: 50px;margin-bottom: 10px"><i class="icon-phone" style="position: absolute;left: 20px"></i> (0361)237-163</li>
                        <li style="padding-left: 50px;margin-bottom: 10px"><i class="icon-envelope" style="position: absolute;left: 20px"></i>Dream@gmail.com</li>
                        <li style="padding-left: 50px;margin-bottom: 10px"><i class="icon-globe" style="position: absolute;left: 20px"></i> <a href="#" target="_blank">Dream.com</a></li>
                    </ul>
                </div>
                
                <div class="col-md-6">
                    <h3 class="display-4" style="font-size: 30px;margin-bottom: 30px">
                        {{-- @if($islogin['login']=='pelanggan'||$islogin['login']=='pegawai')
                            Profil
                        @else
                            Sign Up
                        @endif --}}
                    </h3>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3">{{ __('Name') }}</label>
                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-3">{{ __('Password') }}</label>
                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-3">{{ __('Confirm Password') }}</label>
                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" value="Sign Up" type="submit"><br />
                        </div>
                        <p>Already have an account? <a href="{{URL('/login')}}"><u>Sign in</u></a></p>
                    </form>
                    {{-- @endif --}}
                </div>
            </div>
        </div>

        <footer class="footer" style="text-align: center;"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib <span id="tes"></span></a></footer>

        <div id="exampleModal" class="modal fadeInUp animated" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px">
              <div class="modal-header">
              <div class="modal-body">
                <h2 class="display-4" style="text-align:center;font-size: 30px;padding-bottom: 40px">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class='register-link m-t-15 text-center'>

                        <button type='submit' class='btn btn-primary btn-flat m-b-30 m-t-30'>Sign in</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left:10px">Close</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>

    </div>
    <div style="position:fixed;left:20px;bottom:20px;">
        <a href="https://api.whatsapp.com/send?phone=+6281284308954&text=‎">
        <button style="background:#32C03C;vertical-align:center;height:36px;border-radius:5px">
        <img src="https://web.whatsapp.com/img/favicon/1x/favicon.png">Booking Pesta</button></a>
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="{{ asset('ela/js/lib/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('ela/js/lib/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('ela/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('ela/js/jquery.slimscroll.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('ela/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('ela/js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('ela/js/custom.min.js') }}"></script>

    <script type="text/javascript">
        $(document).scroll(function(){
            var y = $(this).scrollTop();
            var header = $(window).height();
            if(y > header){
                $('.header').css('position','fixed');
            } else {
                $('.header').css('position','relative');
            }
        });
    </script>
    {{-- @if($islogin['login']=='pelanggan'||$islogin['login']=='pegawai') --}}
    <script src="{{ asset('ela/js/lib/toastr/toastr.min.js') }}"></script>
    <!-- scripit init-->
    <script type="text/javascript">
        toastr.success('Kamu login sebagai 'Logged In',{
            timeOut: 5000,
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false

        })
    </script>
    {{-- @endif --}}

</body>

</html>