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
                                <span class="label label-danger" id="notif-badge" style="height: 15px; width: 15px; font-size: 12px">1</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header" id = "notifs-head">You have 3 new notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu" id = "notifs">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> John Appleseed shared a note with you
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
                            <li style="margin-left:15px"><a><input id="homeTag" type="checkbox" class="minimal"/> <i class="fa fa-tags text-aqua"></i> Home</a></li>
                            <li style="margin-left:15px"><a><input id="schoolTag" type="checkbox" class="minimal"/> <i class="fa fa-tags text-green"></i>  School</a></li>
                            <li style="margin-left:15px"><a><input id="workTag" type="checkbox" class="minimal"/> <i class="fa fa-tags text-teal"></i>  Work</a></li>
                            <li style="margin-left:15px"><a><input id="personalTag" type="checkbox" class="minimal"/> <i class="fa fa-tags text-yellow"></i>  Personal</a></li>
                            <li style="margin-left:15px"><a><input id="businessTag" type="checkbox" class="minimal"/> <i class="fa fa-tags text-red"></i>  Business</a></li>
                            <li style="margin-left:15px"><a><input id="miscellaneousTag" type="checkbox" class="minimal"/> <i class="fa fa-tags text-fuchsia"></i>  Miscellaneous</a></li>
                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Right side column. Contains the navbar and content of the page -->
                <aside class="right-side">                
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <input id="title" class="form-control input-lg" type="text" placeholder="Untitled Note" style = "height:60px; font-size:32px;"></input>
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
                                        <button class="btn btn-default" data-widget='remove' data-toggle="modal" data-target="#image-modal" title="Remove"><i class="fa fa-picture-o"></i> Add Image</button>
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

                <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-upload"></i> Upload an Image</h4>
                            </div>
                            <div class="modal-body">
                                <div id="holder">
                                    <span id="plus">+</span>
                                    <span>Drag your image here</div>
                                    </div> 
                                    <p id="upload" class="hidden"><label>Drag & drop not supported, but you can still upload via this input field:<br><input type="file"></label></p>
                                    <p id="filereader">File API & FileReader API not supported</p>
                                    <p id="formdata">XHR2's FormData is not supported</p>
                                    <p id="progress">XHR2's upload progress isn't supported</p>
                                    <div class="modal-footer clearfix">
                                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            <a href="#" class="btn btn-default focusmode-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Focus Mode</span>
                <i class="fa fa-crosshairs"></i> Focus Mode
            </a>
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

        <!-- Drag and drop image annotation js -->


        <script type="text/javascript">

        var holder = document.getElementById('holder'),
        tests = {
          filereader: typeof FileReader != 'undefined',
          dnd: 'draggable' in document.createElement('span'),
          formdata: !!window.FormData,
          progress: "upload" in new XMLHttpRequest
      }, 
      support = {
          filereader: document.getElementById('filereader'),
          formdata: document.getElementById('formdata'),
          progress: document.getElementById('progress')
      },
      acceptedTypes = {
          'image/png': true,
          'image/jpeg': true,
          'image/gif': true
      },
      progress = document.getElementById('uploadprogress'),
      fileupload = document.getElementById('upload');

      "filereader formdata progress".split(' ').forEach(function (api) {
          if (tests[api] === false) {
            support[api].className = 'fail';
        } else {
        // FFS. I could have done el.hidden = true, but IE doesn't support
        // hidden, so I tried to create a polyfill that would extend the
        // Element.prototype, but then IE10 doesn't even give me access
        // to the Element object. Brilliant.
        support[api].className = 'hidden';
    }
});

      function previewfile(file) {
          if (tests.filereader === true && acceptedTypes[file.type] === true) {
            var reader = new FileReader();
            reader.onload = function (event) {
              var image = new Image();
              image.src = event.target.result;
          image.width = 280; // a fake resize
          // if(holder.hasChildNodes()){
          //   holder.replaceChild(holder.lastChild, image);
          // } else {
          //   holder.appendChild(image);
          // }

          if(holder.hasChildNodes()){
            holder.removeChild(holder.lastChild);
        }
        holder.appendChild(image);
    };

    reader.readAsDataURL(file);
}  else {
    holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
    console.log(file);
}
}

function readfiles(file) {
  var formData = tests.formdata ? new FormData() : null;
  for (var i = 0; i < file.length; i++) {
    if (tests.formdata) formData.append('file', file[i]);
    previewfile(file[i]);
}

        // now post a new XHR request
        // if (tests.formdata) {
        //   var xhr = new XMLHttpRequest();
        //   xhr.open('POST', '/devnull.php');
        //   xhr.onload = function() {
        //     progress.value = progress.innerHTML = 100;
        //   };

        //   if (tests.progress) {
        //     xhr.upload.onprogress = function (event) {
        //       if (event.lengthComputable) {
        //         var complete = (event.loaded / event.total * 100 | 0);
        //         progress.value = progress.innerHTML = complete;
        //       }
        //     }
        //   }

        //   xhr.send(formData);
        // }
    }

    if (tests.dnd) { 
        holder.onmouseenter = function () { if(this.className != 'withImage') {this.className = 'hover'; } else { this.className = 'withImageHover'} return false; };
        holder.onmouseleave = function () { if(this.className == 'withImageHover') { this.className = 'withImage'} else if(this.className != 'withImage') { this.className = '';} };
        holder.ondragleave = function () {  if(this.className == 'withImageHover') { this.className = 'withImage'} else if(this.className != 'withImage') { this.className = '';} };
        holder.ondragover = function () { if(this.className != 'withImage') {this.className = 'hover'; } else { this.className = 'withImageHover'} return false; };
        holder.ondragend = function () { return false; };
        holder.ondrop = function (e) {
            this.className = 'withImage';
            e.preventDefault();
            readfiles(e.dataTransfer.files);
        }
    } else {
      fileupload.className = 'hidden';
      fileupload.querySelector('input').onchange = function () {
        readfiles(this.files);
    };
}
</script>

<script>
$(function () {
   if($('#image-modal'). == true) { $('#holder').className = '' } 
});
</script>       

</body>
</html>