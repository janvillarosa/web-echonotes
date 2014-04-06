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
                                <span class="label label-danger" style="height: 15px; width: 15px; font-size: 12px">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 3 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
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
                                <li class="footer"><a href="#">View all</a></li>
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
                        <a href = "/record"><button class = "btn-success btn-lg" style = "width:100%; height:95px">Start A New Echonote</button></a>
                    </div>
                    <!-- search form -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="/">
                                <i class="fa fa-book"></i> <span>All my notes</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-tags"></i>
                                <span>My Note Tags</span><small class = "badge pull-right bg-yellow">9</small>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/?tag=Home"><i class="fa fa-tags text-aqua"></i> Home</a></li>
                                <li><a href="/?tag=School"><i class="fa fa-tags text-green"></i> School</a></li>
                                <li><a href="/?tag=Work"><i class="fa fa-tags text-teal"></i> Work</a></li>
                                <li><a href="/?tag=Personal"><i class="fa fa-tags text-yellow"></i> Personal</a></li>
                                <li><a href="/?tag=Business"><i class="fa fa-tags text-red"></i> Business</a></li>
                                <li><a href="/?tag=Miscellaneous"><i class="fa fa-tags text-fuchsia"></i> Miscellaneous</a></li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="/?tag=Shared">
                                <i class="fa fa-share-square-o"></i> <span>Notes shared with me</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                <i class="fa fa-cog"></i> <span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        My Echonotes
                        <small>Sorted by Newest</small>
                    </h1>
                    <form action="/" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search for your notes..."/>
                            <span class="input-group-btn">
                                <button type='submit' id='search-btn' class="btn btn-flat" style = "background-color:#5cb85c; color:white;"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <?php
                            if($q!=null){
                                $notes = Echonote::where('userid','=',Auth::user()->email)->where('noteName','like','%'.$q.'%')->orderBy('updated_at', 'desc')->get();
                            }
                            else if($tag!=null){
                                $notes = Echonote::where('userid','=',Auth::user()->email)->whereHas("Tag", function($q) use($tag){
                                    $q->where('Tags.tagName', '=', $tag);
                                })->orderBy('updated_at', 'desc')->get();
                            }
                            else{
                                $notes = Echonote::where('userid','=',Auth::user()->email)->orderBy('updated_at', 'desc')->get();
                            }
                            foreach($notes as $note){
                                echo '<div class="col-md-4">
                                            <a href = "/';
                                echo  $note->noteId;
                                echo '"><div class="box box-default">
                                    <div class="box-header">
                                        <h1 class="box-title" style = "font-size:25px">';
                                echo $note->noteName;
                                echo '</h1>
                                        <div class="box-tools pull-right">';
                                            if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Home')->first())!=null){echo '<div class="label bg-aqua">Home</div>';}
                                            if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'School')->first())!=null){echo '<div class="label bg-green">School</div>';}
                                            if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Work')->first())!=null){echo '<div class="label bg-teal">Work</div>';}
                                            if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Personal')->first())!=null){echo '<div class="label bg-yellow">Personal</div>';}
                                            if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Business')->first())!=null){echo '<div class="label bg-red">Business</div>';}
                                            if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Miscellaneous')->first())!=null){echo '<div class="label bg-fuchsia">Miscellaneous</div>';}
                                            if((EchonoteTag::where('noteId', $note->noteId)->where('tagName','=', 'Shared')->first())!=null){echo '<div class="label bg-navy">Shared</div>';}
                                echo    '</div>
                                    </div>
                                    <div class="box-body" style = "font-size:18px; color:#444;">';
                                echo $note->textannotation()->count();
                                echo " annotations";
                                echo '<br>
                                        <b>Duration: </b>';echo (floor($note->duration / 60));echo ":"; echo str_pad(($note->duration % 60), 2, "0", STR_PAD_LEFT);
                                echo    '</div>
                                    <div class="box-footer" style = "color:#444;">
                                        Modified on '; echo $note->updated_at;
                                echo '</div>
                                </div>
                                </a>
                            </div>';
                            }
                        ?>
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

        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

    </body>
</html>