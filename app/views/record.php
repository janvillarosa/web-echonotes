<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Echonote - Echonotes</title>
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
                        <button id = "recordButton" class = "btn-danger btn-lg" style = "width:100%; height:65px" onclick="toggleRecording(this)">Start Recording</button>
                    </div>
                    <!-- search form -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="inactive">
                            <a>
                                <i class="fa fa-clock-o"></i> Duration: <span class="stopwatch" id="test-timer"></span>
                            </a>
                        </li>
                        <li class="inactive">
                            <a>
                                <i class="fa fa-tag"></i> <span><b>Tag this note</b></span>
                            </a>
                        </li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"/>  Home</a></li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"/>  School</a></li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"/>  Work</a></li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"/>  Personal</a></li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"/>  Business</a></li>
                        <li style="margin-left:15px"><a><input type="checkbox" class="minimal"/>  Miscellaneous</a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <input class="form-control input-lg" type="text" placeholder="Untitled Note" style = "height:60px; font-size:32px;"></input>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12 extra-pad" id="notelist">
                            <div class="box-note">
                                <div class='box-body pad'>
                                      <textarea id="edit" style="height:100px"></textarea>
                                </div>
                                <div class="box-footer" style = "height:35px">
                                    <div class="pull-left box-tools">
                                        <button class="btn btn-default" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-picture-o"></i> Add Image</button>
                                    </div>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-success" onclick="submitAnnotation()" title="Submit Annotation">Submit</button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-footer-->
                            </div>
                            <!-- Info box -->
                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery-2.1.0.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!--iCheck-->
        <script src="js/plugins/iCheck/icheck.min.js"></script>
        <!--Froala Text Editor-->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/froala_editor.min.js"></script>
        <!--Main JS-->
        <script src="js/main.js"></script>
        <script src="js/recorder.js"></script>

        <script>
            $(function(){
                $("#edit").editable({inlineMode: false, height: 100, buttons: ['bold', 'italic', 'strikeThrough', 'fontSize', 'color', 'sep', 'formatBlock', 'align', 'insertOrderedList', 'insertUnorderedList', 'outdent', 'indent', 'sep',
                    'undo', 'redo'],})
            });
        </script>

    </body>
</html>