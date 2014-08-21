<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home - Echonotes</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/mainstyle.css" rel="stylesheet" type="text/css" />

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
                                <span class="label label-danger" style="height: 15px; width: 15px; font-size: 12px">1</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 3 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu" id = "notifs">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> John Appleseed shared a note with you
                                            </a>
                                        </li>
                                    </ul>
                                <li class="footer"><a href="#">Dismiss All</a></li>
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
                        <div class="pull-left image">
                            <img src="../../img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo Auth::user()->name; ?></p>

                            <?php echo Auth::user()->email; ?>
                        </div>
                    </div>
                    <!-- search form -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="/">
                                <i class="fa fa-book"></i> <span>Go back to my notes</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header" style="padding: 15px 15px 16px 20px;">
                    <h1>
                        User Settings
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row" style = "padding:0 10px 0 13px">
                    <div class="col-md-6">
                        <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Change User Information</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Change Account Name</label>
                                            <input type="text" class="form-control" placeholder="What your friends call you..."/>
                                        </div>
                                        <div class="form-group">
                                            <label>Change E-mail Address</label>
                                            <input type="text" class="form-control" placeholder="Your often used e-mail address..."/>
                                        </div>
                                </div>
                                <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Change Info</button>
                                    </div>
                        </div>
                        <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Delete my Account</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <p>Doing this will make your account disappear, together with the notes you made. Please be careful!</p>
                                    <button class = "btn-danger btn" data-toggle="modal" data-target="#delete-modal">Delete my account forever</button>
                                </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Change Password</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Change Account Name</label>
                                            <input type="text" class="form-control" placeholder="What your friends call you..."/>
                                        </div>
                                        <div class="form-group">
                                            <label>Change E-mail Address</label>
                                            <input type="text" class="form-control" placeholder="Your often used e-mail address..."/>
                                        </div>
                                </div>
                                <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                        </div>
                    </div>

                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-trash-o"></i> Are you really sure?</h4>
            </div>
            <form action="/note/delete" method="post">
                <div class="modal-body">
                    <p>Are you sure you want to delete your account forever? This cannot be undone!</p>
                </div>
                <div class="modal-footer clearfix">
                    <button type="submit" class="btn btn-danger pull-right">Delete my account</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery-2.1.0.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

    </body>
</html>