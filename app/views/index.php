<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Echonotes - Home</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/Framework/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <!-- <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet"> -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/homepage.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper" style="position: fixed">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                </button>
                <a class="navbar-brand" href="index.html" style="color:white"><span><img src="img/homepage/echonotes-logo.png" height=31.33 width=16.67> Echonotes</span></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle user-toggle" data-toggle="dropdown" href="/logout">
                        Hi, <?php echo Auth::user()->name; ?>
                    </a>
                    
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
				<div class="btn-start">
                        <a href="index.html"><img src="img/homepage/start-button.png" width=100% height=100%></a>
						</div>
						<br>
					<b>My Tags</b>
                    <li>
                        <a href=""><img src="img/homepage/tag-cyan.png" width=15 height=15> Home</a>
                    </li>
                    <li>
                        <a href=""><img src="img/homepage/tag-magenta.png" width=15 height=15></i> School</a>
                    </li>
                    <li>
                        <a href=""><img src="img/homepage/tag-green.png" width=15 height=15></i> Work</a>
                    </li>
                    <li>
                        <a href=""><img src="img/homepage/tag-red.png" width=15 height=15></i> Miscellaneous</a>
                    </li>
					<br>
					<b>Shared</b>
                    <li>
                        <a href=""><img src="img/homepage/tag-blue.png" width=15 height=15> Notes shared with me</a>
                    </li>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

        <div id="page-wrapper">
		<ul class="nav" id="side-menu">
			<center>
            <li class="search">
                <div class="input-group custom-search-form">
                    <input name="searchBox" type="text" class="form-control" placeholder="Search for your notes...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i
                        </button>
                    </span>
                </div>
            </li>
            </center>
    <div class="span5">
        <ul>
            <li><a href="note.html">
                <img src="img/homepage/note-icon.png" alt="Generic placeholder image" height = "150" width = "150">
                <span>Note 1</span><span>5 annotations</span>
            </a></li>
            <li><a href="note.html">
                <img src="img/homepage/note-icon.png" alt="Generic placeholder image" height = "150" width = "150">
                <span>Note 2</span><span>5 annotations</span>
            </a></li>
            <li><a href="note.html">
                <img src="img/homepage/note-icon.png" alt="Generic placeholder image" height = "150" width = "150">
                <span>Note 3</span><span>5 annotations</span>
            </a></li>
            <li><a href="note.html">
                <img src="img/homepage/note-icon.png" alt="Generic placeholder image" height = "150" width = "150">
                <span>Note 4</span><span>5 annotations</span>
            </a></li>
            <li><a href="note.html">
                <img src="img/homepage/note-icon.png" alt="Generic placeholder image" height = "150" width = "150">
                <span>Note 5</span><span>5 annotations</span>
            </a></li>
            <li><a href="note.html">
                <img src="img/homepage/note-icon.png" alt="Generic placeholder image" height = "150" width = "150">
                <span>Note 6</span><span>5 annotations</span>
            </a></li>
            <li><a href="note.html">
                <img src="img/homepage/note-icon.png" alt="Generic placeholder image" height = "150" width = "150">
                <span>Note 7</span><span>5 annotations</span>
            </a></li>

        </ul>
    </div>
    <script src="bootstrap.min.js"></script>
    <script src="holder.js"></script>    
                        <!-- /input-group -->
			</center>
		</ul>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>
