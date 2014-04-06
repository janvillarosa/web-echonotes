<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php $note = Echonote::where('noteId', '=', $noteId)->firstOrFail();?>
        <title><?php echo $note->noteName;?> - Echonotes</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
        <link href="css/froala_editor.css" rel="stylesheet">

        <link href="css/ionslider/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
        <!-- ion slider Nice -->
        <link href="css/ionslider/ion.rangeSlider.skinNice.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap slider -->
        <link href="css/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue fixed">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="/" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src = "img/echonotes-logo.png"/>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="label label-danger" id="notif-badge" style="height: 15px; width: 15px; font-size: 12px">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header" id = "notifs-head">You have 3 new notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu" id = "notifs">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> Jan Villarosa shared a note with you
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> Jane Doe shared a note with you
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> No more space? Join Echonotes+ today.
                                            </a>
                                        </li>
                                    </ul>
                                <li class="footer"><a href="#" onclick = "removeNotfication()">Dismiss All</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo Auth::user()->name; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <p>
                                        <?php echo Auth::user()->name; ?>
                                        <small><?php echo Auth::user()->email; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Settings</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <button class = "btn-info btn-lg" id = "playButton" style = "width:100%; height:65px" onclick = "togglePlaying(this);"><i class = "glyphicon glyphicon-play"></i> Play Echonote</button>
                    </div>
                    <!-- search form -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="inactive">
                            <a>
                                <i class="fa fa-clock-o"></i> <span><b>Duration: <?php echo (floor($note->duration / 60));echo ":"; echo str_pad(($note->duration % 60), 2, "0", STR_PAD_LEFT);?></b></span>
                            </a>
                        </li>
                        <li class="inactive">
                            <a>
                                <i class="fa fa-tag"></i> <span><b>Tag this note</b></span>
                            </a>
                        </li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"<?php if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Home')->first())!=null){echo 'checked';}?>/>  Home</a></li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"<?php if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'School')->first())!=null){echo 'checked';}?>/>  School</a></li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"<?php if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Work')->first())!=null){echo 'checked';}?>/>  Work</a></li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"<?php if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Personal')->first())!=null){echo 'checked';}?>/>  Personal</a></li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"<?php if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Business')->first())!=null){echo 'checked';}?>/>  Business</a></li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"<?php if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Miscellaneous')->first())!=null){echo 'checked';}?>/>  Miscellaneous</a></li>
                    </ul>
                    <div class="user-panel">
                        <button class = "btn-danger btn" data-toggle="modal" data-target="#delete-modal">Delete Note</button>
                        <button class = "btn-warning btn" data-toggle="modal" data-target="#share-modal">Share Note</button>
                    </div>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header note-header">
                    <h1 style = "padding-bottom: 5px; font-size:24px;">
                        <?php echo $note->noteName;?>
                        <small><?php echo $note->textannotation()->count();?> annotations</small>
                    </h1>
                    <div>
                        <div class = "seekbar" style="right:0px;">
                            <input id = "slider" type="text" value="" class="slider form-control" data-slider-min="0" data-slider-max="5000" data-slider-step="1" data-slider-value="0" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="blue"/>
                        </div>
                        <div id = "timer" style ="display:inline-block; float:left; width:50px;">00:00</div>
                        <div id = "duration" style ="display:inline-block; float:right;"><?php echo (floor($note->duration / 60));echo ":"; echo str_pad(($note->duration % 60), 2, "0", STR_PAD_LEFT);?></div>
                    </div>
                </section>

                <!-- Main content -->
                <section class="content" style = "padding-top:110px;">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                        <ul class="timeline">
                                <!-- timeline time label -->
                                <li class="time-label">
                                    <span class="bg-green">
                                        Start Echonote
                                    </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <?php
                                $annotations =  $note->textannotation()->get();
                                $index = 1;
                                foreach($annotations as $annotation){
                                    echo    '<li>
                                                <i class="fa  fa-file bg-green"></i>
                                                <div class="timeline-item" id = "'; echo 'anno'; echo $index; echo'">
                                                    <span class="time"><i class="fa fa-clock-o"></i> ';echo (floor($annotation->timestamp / 60));echo ":"; echo str_pad(($annotation->timestamp % 60), 2, "0", STR_PAD_LEFT);echo 
                                                    '</span>
                                                    <h3 id = "title" class="timeline-header">Annotation ';echo $index;echo '</h3>
                                                    <div class="timeline-body">';
                                            echo    $annotation->content;
                                            echo    '</div>
<<<<<<< HEAD
                                                    <div class="timeline-footer" style = "height:40px">
                                                        <a class="btn btn-danger btn-xs" style = "float:right">Delete Annotation</a>
=======
                                                    <div class="timeline-footer">
                                                        <a class="btn btn-primary btn-xs">Edit Annotation</a>
                                                        <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteAnnotation-modal">Delete</a>
>>>>>>> FETCH_HEAD
                                                    </div>
                                                </div>
                                            </li>';
                                    $index++;
                                }
                                ?>
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                </li>
                            </ul>
                        </div><!-- /.col -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            <a href="#" class="btn btn-default focusmode-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Focus Mode</span>
                    <i class="fa fa-crosshairs"></i> Focus Mode
            </a>
        </div><!-- ./wrapper -->

        <div class="modal fade" id="share-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-share-square-o"></i> Share this Note</h4>
                    </div>
                    <form action="/note/share" method="post">
                        <div class="modal-body image-div">
                            <p>Share this note to a friend. The note will be duplicated for the recipient.</p>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Share to:</span>
                                    <input name="email" type="email" class="form-control" placeholder="Recipient's E-mail" style="width:480px">
                                    <input name="noteid" type="hidden" value="<?php echo $noteId;?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <input type="submit" class="btn btn-success pull-right" value="Share">
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash-o"></i> Delete this Note</h4>
                    </div>
                    <form action="/note/delete" method="post">
                        <div class="modal-body">
                            <p>Are you sure you want to delete this note? This cannot be undone.</p>
                        </div>
                        <div class="modal-footer clearfix">
                            <input name="noteid" type="hidden" value="<?php echo $noteId;?>">
                            <button type="submit" class="btn btn-danger pull-right">Delete</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

         <div class="modal fade" id="deleteAnnotation-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash-o"></i> Delete this Annotation</h4>
                    </div>
                    <form action="/note/deleteAnnotation" method="post">
                        <div class="modal-body">
                            <p>Are you sure you want to delete this annotation? This cannot be undone.</p>
                        </div>
                        <div class="modal-footer clearfix">
                            <input name="annotationid" type="hidden" value="<?php echo $annotation->annotationId;?>">
                            <button type="submit" class="btn btn-danger pull-right">Delete</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery-2.1.0.min.js"></script>
        <!-- Sound Manager -->
        <!-- Page player core CSS -->
        <script src="player/script/soundmanager2-nodebug-jsmin.js"></script>
        <script>
        soundManager.setup({
          url: 'player/swf',
          flashVersion: 9, // optional: shiny features (default = 8)
          // optional: ignore Flash where possible, use 100% HTML5 mode
          // preferFlash: false,
          debugMode:true,
          onready: function() {

          }
        });
        </script>
        <script src="player/customplayer.js"></script>
        <!-- Sound Manager end -->
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!--iCheck-->
        <script src="js/plugins/iCheck/icheck.min.js"></script>
        <!--Froala Text Editor-->
        <script src="js/jquery-1.10.2.js"></script>

        <!-- Ion Slider -->
        <script src="js/plugins/ionslider/ion.rangeSlider.min.js" type="text/javascript"></script>

        <!-- Bootstrap slider -->
        <script src="js/plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {
                /* BOOTSTRAP SLIDER */
                $('.slider').slider();

                /* ION SLIDER */
                $("#range_1").ionRangeSlider({
                    min: 0,
                    max: 5000,
                    from: 1000,
                    to: 4000,
                    type: 'double',
                    step: 1,
                    prefix: "$",
                    prettify: false,
                    hasGrid: true
                });
                $("#range_2").ionRangeSlider();

                $("#range_5").ionRangeSlider({
                    min: 0,
                    max: 10,
                    type: 'single',
                    step: 0.1,
                    postfix: " mm",
                    prettify: false,
                    hasGrid: true
                });
                $("#range_6").ionRangeSlider({
                    min: -50,
                    max: 50,
                    from: 0,
                    type: 'single',
                    step: 1,
                    postfix: "°",
                    prettify: false,
                    hasGrid: true
                });

                $("#range_4").ionRangeSlider({
                    type: "single",
                    step: 100,
                    postfix: " light years",
                    from: 55000,
                    hideMinMax: true,
                    hideFromTo: false
                });
                $("#range_3").ionRangeSlider({
                    type: "double",
                    postfix: " miles",
                    step: 10000,
                    from: 25000000,
                    to: 35000000,
                    onChange: function(obj) {
                        var t = "";
                        for (var prop in obj) {
                            t += prop + ": " + obj[prop] + "\r\n";
                        }
                        $("#result").html(t);
                    },
                    onLoad: function(obj) {
                        //
                    }
                });
            }
            );
        </script>
        <script>
             $(function() {
                initSound('<?php echo $note->audioURL;?>');
            });
        </script>

        <?php
        $annotations =  $note->textannotation()->get();
        $tsArr = array();
        $index = 1;
        foreach($annotations as $annotation){
            $tsArr[] = floor($annotation->timestamp);
            $index++;
        }
        ?>

        <script>
            var timestamps = <?php echo json_encode($tsArr);?>;
            setTimestamp(timestamps);

        </script>

    </body>
</html>