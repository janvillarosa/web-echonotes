<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Echonotes</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/Framework/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
                    <img src="img/frontpage/branding-intro-logo.png" alt="Echonotes logo" height="40" width="40"> Echonotes
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#download">Mobile</a>
                    </li>
                    <li class="page-scroll">
                        <a href="login.html"><b>Sign in</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <img src="img/frontpage/branding-intro-logo.png" alt="Echonotes logo" height="250" width="250">
                        <h1 class="brand-heading">Echonotes</h1>
                        <p class="intro-text">Never miss a word ever again. Echonotes takes advantage of audio, photos
                            and text annotations to make note taking and reviewing easier and more effective. <br>It's free. Register today.</p>
                        <div class="page-scroll">
                        <a href="#signup" class="btn btn-default-white btn-lg">Get started</a>       
                            <br><br><br>
                            <a href="#about" class="btn btn-circle">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <img src="img/frontpage/3steps.png" alt="Record. Annotate. Review." height="100%" width="100%">
                <br><br><br><br>
                <h2>It's note taking reimagined.</h2>
                <p>It started with a simple question: how can we take notes more effectively? 
                    We carefully studied how students take notes inside the classroom - and came up with Echonotes. It uses your phone’s camera, microphone and on-screen keyboard to make note-taking more comprehensive.
                </p>
                <p>Echonotes also stores all your notes in the cloud so you can take notes
                        whenever and wherever you go. Reviewing is also easier because Echonotes remembers when you
                        paused your session, so you can pick up where you left off.
                </p>
            </div>
        </div>
    </section>

    <section id="download" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Take your notes anywhere.</h2>
                    <p>Echonotes is also available on Android. Your notes in your laptop and in your phone are synced automatically, no need to upload and update. Get it now on the Google Play Store today.</p>

                    <a href="http://startbootstrap.com/grayscale" class="btn btn-default-white btn-lg">Download Echonotes for Android</a>
                </div>
            </div>
        </div>
    </section>

    <section id="signup" class="container content-section">
        <div class="signup-section" style="height:20%">
            <div class="col-lg-8 col-lg-offset-2">
                <center>
                <h2>Start using Echonotes today</h2>
                <p>Register for a free account. All you need is an email, and your own name.</p>
                </center>
                        <form class = "sign-up">
                            <b>Full Name<br>
                            <input class="form-control" type="text" placeholder="Full Name">
                            <b>Email<br>
                            <input class="form-control" type="email" placeholder="example@email.com">
                            <b>Password<br>
                            <input class="form-control" type="password" placeholder="Password">
                            <b>Confirm Password<br>
                            <input class="form-control" type="password" placeholder="Confirm Password">
                        </form>
                        <center>
                        <a href="index.html" class="btn btn-default btn-lg">Register</a>
                        </center>
            </div>
        </div>
    </section>

    <div id="map"></div>

    <!-- Core JavaScript Files -->
    <script src="js/Framework/jquery-1.10.2.js"></script>
    <script src="js/Framework/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - You will need to use your own API key to use the map feature -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
