<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Echonotes</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/Framework/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
    <link href="css/Framework/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/fonts.css" rel="stylesheet" />

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
                <a class="navbar-brand" href="#page-top"><img src="img/frontpage/logo.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse" style="height:auto; margin-left:20px">
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
                        <a id = "login-trigger"><b>Sign in</b><span></span></a>
                        <div id="login-content">
                        <form role="form" method="post">
                            <fieldset id="inputs">
                                <input id="username" type="email" name="email" placeholder="Your email address" required>   
                                <input id="password" type="password" name="password" placeholder="Password" required>
                            </fieldset>
                            <fieldset id="actions">
                                <label style="color:black; font-weight: normal"><input type="checkbox" checked="checked"> Keep me signed in</label><br>
                                <input type="submit" class="btn btn-default-login" value="    Sign in    " style="float:right">
                            </fieldset>
                        </form>
      </div>                     
    </li>
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
                        <img src="img/frontpage/branding-intro-logo.png" alt="Echonotes logo" height = "40%" width = "40%">
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

    <section id="about" class="container content-section">
        <!-- About Section -->
<div id="about" class="page-alternate">
<div class="container">
    <!-- Title Page -->
    <div class="row text-center">
        <div class="span12">
            <img src="img/frontpage/web-echonotes-hero.png" alt="Echonotes on the Web" height = "70%" width = "70%" style="margin-bottom: 20px">
            <div class="title-page">
                <h2 class="title" style = "font-weight: 400; color: #13a37f; font-size: 50px;">It's note taking. With a twist.</h2>
                <h3 class="title-description"></h3>
                
                <div class="page-description">
                    <p>It started with a simple question: how can we take notes more effectively? 
                    We carefully studied how students take notes inside the classroom - and
                    came up with Echonotes. It uses your phone’s camera, microphone 
                    and on-screen keyboard to make note-taking more comprehensive.</p>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    
    <!-- Services Boxes -->
    <div class="row text-center">
        <div class="span4">
            <div class="services-box">
                <div class="icon">
                    <span><img src="img/frontpage/record icon.png" alt="Record" height = "150" width = "150" style="margin-bottom: 30px"></span>
                </div>
                <h3 style = "font-weight: 400; color: #13a37f; font-size: 30px;">Record.</h3>
                <p>Record your professor’s lecture 
                    before you start taking notes. 
                    Echonotes records the
                    whole lecture so you never 
                    miss a single word ever again.</p>
            </div>
        </div>
        
        <div class="span4">
            <div class="services-box">
                <div class="icon">
                    <span><img src="img/frontpage/annotate icon.png" alt="Annotate" height = "150" width = "160" style="margin-bottom: 30px"></span>
                </div>
                <h3 style = "font-weight: 400; color: #13a37f; font-size: 30px;">Annotate.</h3>
                <p>Take notes while the app is
                    recording.There are text 
                    annotations for summarizing 
                    complicated concepts, and 
                    picture annotations for quick 
                    snapshots of the blackboard.</p>
            </div>
        </div>
        
        <div class="span4">
            <div class="services-box">
                <div class="icon">
                    <span><img src="img/frontpage/play icon.png" alt="Review" height = "150" width = "150" style="margin-bottom: 30px"></span>
                </div>
                <h3 style = "font-weight: 400; color: #13a37f; font-size: 30px;">Review.</h3>
                <p>Review easier with Echonotes’ 
                    biggest feature - timed 
                    annotations. Your notes only 
                    appear at the time you 
                    originally took it, so your
                    notes make more sense.</p>
            </div>
        </div>
    </div>
    <!-- End Services Boxes -->
    </section>

    <section id="download" class="content-section">
        <div class="download-section">
            <div class="container">
            <div class="row margin-40">
            <div class="span9">
            <h3 style = "font-weight: 400; font-size: 50px;">Take your notes wherever you go.</h3>
            <p>Echonotes is not just available on the web. It's also available on your smartphone. It's
                everything you love in the full web application, but designed to be more portable and easier to use in a smaller screen.
                With the Echonotes app, you can take notes easier and faster anywhere you go.</p>
            
            <p>With cloud storage and cloud syncing built into every account, you can review the notes you took on your laptop, right into
                your smartphone. Syncing is automatically done for you. No more fiddling around, so you can focus on studying your notes.
            </p>
            
        </div>
        
        <div class="span3">
            <center>
            <img src="img/frontpage/mobile-echonotes-hero.png" alt="Echonotes Mobile">
            </center>
        </div>
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
                        <form class = "sign-up" action="/register" method="post">
                            <b>Full Name<br>
                            <input name="username" class="form-control" type="text" placeholder="Full Name">
                            <b>Email<br>
                            <input name="email" class="form-control" type="email" placeholder="example@email.com">
                            <b>Password<br>
                            <input name="password"class="form-control" type="password" placeholder="Password">
                            <b>Confirm Password<br>
                            <input name="confirm_password" class="form-control" type="password" placeholder="Confirm Password">
                        </form>
                        <center>
                        <input type="submit" value="Register" class="btn btn-default btn-lg">
                        </center>
                        </b></b></b></b>
            </div>
        </div>
    </section>

<!-- Footer -->
<footer>
    <div id="social-area" class="page">
    <div class="container" style="padding-right:0px;">
        <div class="row">
            <div class="span12" style="margin-left:40px;">
                <nav id="social">
                    <ul>
                        <li><a href="https://twitter.com/" title="Follow Us on Twitter" target="_blank"><span class="font-icon-social-twitter"></span></a></li>
                        <li><a href="https://www.facebook.com/echonotesapp" title="Follow Us on Facebook" target="_blank"><span class="font-icon-social-facebook"></span></a></li>
                        <li><a href="https://plus.google.com/" title="Follow Us on Google Plus" target="_blank"><span class="font-icon-social-google-plus"></span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
    <p style = "font-weight:50px; font-size:13px; margin-bottom:0px"> Echonotes - Copyright 2014<br> Made in the great city of Manila </p>
</footer>

    <!-- Core JavaScript Files -->
    <script src="js/Framework/jquery-1.10.2.js"></script>
    <script src="js/Framework/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
        $('#login-trigger').click(function(){
        $(this).next('#login-content').slideToggle();
        $(this).toggleClass('active');          
    
        if ($(this).hasClass('active')) $(this).find('span').html('')
        else $(this).find('span').html('')
        })
        });
    </script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
