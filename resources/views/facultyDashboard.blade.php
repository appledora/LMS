<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faculty Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet"><!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css"><!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css"><!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css"><!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css"><!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script><!-- FOR IE9 below --><!--[if lt IE 9]>
    <script src="js/respond.min.js"></script> <![endif]--></head>

<body>
<div class="fh5co-loader"></div>
<div id="page">
    <header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner"
            style="background-image:url(images/FotoJet2.jpg);" data-stellar-background-ratio="0.5">
        {{--<div class="overlay"></div>--}}
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t js-fullheight">
                        <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                            <div class="profile-thumb" style="background: url(images/user-3.jpg);"></div>
                            @php
                                $user =Auth::guard('web_faculty')->user();
                                dd($user);
                                $name = $user -> f_name;
                                $code = $user ->f_codename;
                                $mail = $user ->email;
                                $des = $user -> f_designation;
                            @endphp
                            <h1><span>{{$name}}</span></h1>
                            <h3><span>{{$des}}</span></h3>
                            <p>
                            <ul class="fh5co-social-icons">

                            </ul>
                            </p></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="fh5co-about" class="animate-box">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading"></div>
            </div>
            <div class="col-md-6"><h2>About Me</h2>
                <ul class="info">
                    <li><span class="first-block">Full Name:</span><span class="second-block">{{$name}}</span>
                    </li>
                    <li><span class="first-block">Codename:</span><span class="second-block">{{$code}}</span></li>
                    <li><span class="first-block">Email:</span><span class="second-block">{{$mail}}</span></li>
                    <li class="btn-block">   <form action="faculty_logout" method="post" class="btn-circle" >
                            @csrf
                            <button type = 'submit' class="btn-outline-danger" > Logout </button>
                        </form></li>
                </ul>

            </div>


        </div>

    </div>

    <div class="gototop js-top"><a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a></div><!-- jQuery -->
    <script src="js/jquery.min.js"></script><!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script><!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script><!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script><!-- Stellar Parallax -->
    <script src="js/jquery.stellar.min.js"></script><!-- Easy PieChart -->
    <script src="js/jquery.easypiechart.min.js"></script><!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
    <script src="js/google_map.js"></script><!-- Main -->
    <script src="js/main.js"></script>
</body>
</html>
