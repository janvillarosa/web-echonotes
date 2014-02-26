<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Note #1</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/Framework/bootstrap.min.css" rel="stylesheet">

    <!-- Page Level CSS - Include with every page -->
    <link href="css/homepage.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- SB Admin CSS - Include with every page -->
<link href="css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="js/jquery-1.10.2.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.js"><\/script>')</script>
        <script src="js/jplayer/jquery.jplayer.js"></script>
        <script src="js/jquery.audioslideshow.js"></script>
        <script>
            $(document).ready(function() {
                $('.audio-slideshow').audioSlideshow();
            });
        </script>
</head>

<body>

    <div id="wrapper" style="position: fixed">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                </button>
                <a class="navbar-brand" href="#top_page" style="color:white"><img src="img\homepage\echonotes-logo.png" height=31.33 width=16.67> Echonotes</a>
            </div>
        </nav>
        <nav class="navbar-toolbar" role="navigation" style="margin-bottom: 0">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    File
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>New</div>        
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            Open
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            Save
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            Save as...
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Edit
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>New</div>        
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            Open
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            Save
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            Save as...
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Share
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>New</div>        
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            Open
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            Save
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            Save as...
                        </a>
                    </li>
                </ul>
            </li>
        <!-- </nav>
            <nav class="navbar-toolbar" role="navigation" style="margin-bottom: 0"> -->
                <!--
                <li class="divider"></li>
                <div class="navbar-title">
                    ALGOCOM - Master's Method
                </div>
                <a class="navbar-play" onClick="toggleRecording(this)">
                    <i class="fa fa-play fa-fw"></i>
                </a>
                <li class="divider"></li>
            </nav>-->
            <section>
                <div id="audio-slideshow" class="audio-slideshow" data-audio="Kurt_Vile_-_01_-_Freeway.mp3" data-audio-duration="161">
                    <div class="audio-slides">
                        <img src="http://farm2.staticflickr.com/1012/3175040364_7eef7d257f_z.jpg?zz=1" alt="[Dalen, Telemarken (i.e, Telemark), Norway] (LOC)" data-thumbnail="http://farm2.staticflickr.com/1012/3175040364_7eef7d257f_t.jpg" data-slide-time="0">
                        <img src="http://farm2.staticflickr.com/1145/3175012896_02056f183d_z.jpg?zz=1" alt="[Near Hjelmso, Fuglebjerget, Norway] (LOC)" data-thumbnail="http://farm2.staticflickr.com/1145/3175012896_02056f183d_t.jpg" data-slide-time="10">
                        <img src="http://farm4.staticflickr.com/3108/3175013342_54f5b20138_z.jpg?zz=1" alt="[The Seven Sisters, Geiranger Fjord, Norway] (LOC)" data-thumbnail="http://farm4.staticflickr.com/3108/3175013342_54f5b20138_t.jpg" data-slide-time="30">
                        <img src="http://farm2.staticflickr.com/1192/3175013574_0f485bdb7f_z.jpg?zz=1" alt="[Praekestolen, Geiranger Fjord, Norway] (LOC)" data-thumbnail="http://farm2.staticflickr.com/1192/3175013574_0f485bdb7f_t.jpg" data-slide-time="45">
                        <img src="http://farm2.staticflickr.com/1019/3174174579_0c6a63ca70_z.jpg?zz=1" alt="[Kongen og Dronningen, Bispen, Norway] (LOC)" data-thumbnail="http://farm2.staticflickr.com/1019/3174174579_0c6a63ca70_t.jpg?" data-slide-time="70">
                        <img src="http://farm4.staticflickr.com/3117/3175014052_7484da1205_z.jpg?zz=1" alt="[Merok, Geiranger Fjord, Norway] (LOC)" data-thumbnail="http://farm4.staticflickr.com/3117/3175014052_7484da1205_t.jpg" data-slide-time="90">
                        <img src="http://farm2.staticflickr.com/1078/3175018738_03f949816c_z.jpg?zz=1" alt="[Buerbrae Glacier, Odde, Hardanger Fjord, Norway] (LOC)" data-thumbnail="http://farm2.staticflickr.com/1078/3175018738_03f949816c_t.jpg" data-slide-time="110">
                        <img src="http://farm2.staticflickr.com/1139/3174180591_a5e318c84b_z.jpg?zz=1" alt="[Folgefond Glacier, Hardanger Fjord, Norway] (LOC)" data-thumbnail="http://farm2.staticflickr.com/1139/3174180591_a5e318c84b_t.jpg" data-slide-time="130">
                        <img src="http://farm2.staticflickr.com/1091/3174186405_4654a14ae4_z.jpg?zz=1" alt="[Naerodalen, Hardanger Fjord, Norway] (LOC)" data-thumbnail="http://farm2.staticflickr.com/1091/3174186405_4654a14ae4_t.jpg" data-slide-time="150">
                    </div>
                    <div class="audio-control-interface">
                        <div class="play-pause-container">
                            <a href="javascript:;" class="audio-play" tabindex="1">Play</a>
                            <a href="javascript:;" class="audio-pause" tabindex="1">Pause</a>
                        </div>
                        <div class="time-container">
                            <span class="play-time"></span> / <span class="total-time"></span>
                        </div>
                        <div class="timeline">
                            <div class="timeline-controls"></div>
                            <div class="playhead"></div>
                        </div>
                        <div class="jplayer"></div>
                    </div>
                </div>
            </section>
        </div>


        <!-- Core Scripts - Include with every page -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!--<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>


        <!-- Page-Level Plugin Scripts - Dashboard -->
        <!--
        <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
        <script src="js/plugins/morris/morris.js"></script>

        <!-- SB Admin Scripts - Include with every page -->
        <!--
        <script src="js/sb-admin.js"></script>

        <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
        <!--<script src="js/demo/dashboard-demo.js"></script>-->
        <script src="js/audiodisplay.js"></script>
        <script src="js/recorderjs/recorder.js"></script>
        <script src="js/main.js"></script>

    </body>

    </html>
