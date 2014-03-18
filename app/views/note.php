<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Untitled Note - Echonotes</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/Framework/bootstrap.min.css" rel="stylesheet">

    <!-- Page Level CSS - Include with every page -->
    <link href="css/record.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <link rel="stylesheet" type="text/css" href="/skin/jplayer.blue.monday.css" />

    <script>
    $(document).ready(function() {
        $('.audio-slideshow').audioSlideshow();
    });
    </script>

    <script>
    $(document).ready(function(){
        $('.navbar-play').live('click', function(event) { 
           document.write('asidhunaklmdl,asd,saz');       
           $('.note-div').toggle('show');
       });
    });
    </script>
</head>

<body>

    <div id="wrapper" style="position: fixed">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="/" style="color:white"><span><img src="img/homepage/echonotes-logo.png" height=32% width=32%></span></a>
            </div>

            <ul class="nav navbar-top-links navbar-right" style = "padding-bottom:30px; margin-top:0px;">
                <li class="dropdown">
                    <a class="user-toggle" href="/logout">
                        Hi, <?php echo Auth::user()->name; ?>
                    </a>
                </li>
            </ul>
            <!-- /.navbar-header -->
        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-toolbar" role="navigation" style="margin-bottom: 0">
            <li class="divider"></li>
            <a class="navbar-play navbar-right" style="float:right; margin-right: -115px;">
                    <img src="img/homepage/annotate-button.png" height=40% width=40% style="float:right; margin-top: 25px;"></span></a>
                </a>
            <span id="divtitle" style="display:inline">
                <div id = "title"> Untitled Note </div>
                <div id = "divtitle"> 2 annotations<br>Tags: Home</div>
                
            </span>
        </nav>
        <nav class="navbar-toolbar" role="navigation">
            <body>
  <div id="jquery_jplayer_1" class="jp-jplayer"></div>
  <div id="jp_container_1" class="jp-audio">
    <div class="jp-type-single">
      <div class="jp-gui jp-interface">
        <ul class="jp-controls">
          <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
          <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
          <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
          <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
          <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
        </ul>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
        <div class="jp-time-holder">
          <div class="jp-current-time"></div>
          <div class="jp-duration"></div>
          <ul class="jp-toggles">
          </ul>
        </div>
      </div>
      <div class="jp-no-solution">
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>
        </nav>

        <div class="note-div">
            <div id="note-canvas">
                <textarea class="note-textarea" placeholder="Your notes here..."></textarea>
            </div>
        </div>
            <!--
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
        -->
    </div>


    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.jplayer.min.js"></script>
    <script src="js/jquery.audioslideshow.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
      $("#jquery_jplayer_1").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            mp3: "test.mp3",
          });
        },
        swfPath: "/js",
        supplied: "mp3"
      });
    });
    </script>

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
        <script src="js/main.js"></script>


    </body>

    </html>