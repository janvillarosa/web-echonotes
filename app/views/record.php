<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> New Echonote - Echonotes</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/Framework/bootstrap.min.css" rel="stylesheet">

    <!-- Page Level CSS - Include with every page -->
    <link href="css/record.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />


    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/h5utils.js"></script>

    <!-- Swap annotation display -->
    <script>
    $(document).ready(function(){
    $('#change-annotation').click(function() {
    if ($(this).attr('name') == 'showText') {
        $('#note-textarea').css('visibility','hidden');
        $('#note-imagearea').css('visibility','visible');
        $('#annotation-button-text').text('Add Text Annotation');
        $(this).attr('name', 'showImage');
    } else {
        $('#note-textarea').css('visibility','visible');
        $('#note-imagearea').css('visibility','hidden');
        $('#annotation-button-text').text('Add Image Annotation');
        $(this).attr('name', 'showText');
      }
    });
  });


    // function showImg(){
    //     document.getElementById("note-textarea").style.visibility = "hidden";
    //     document.getElementById("note-imgarea").style.visibility = "visible";
    //     $('#change-annotation').click(function() { showTxt(); });
    // }

    // function showTxt(){
    //     document.getElementById("note-textarea").style.visibility = "visible";
    //     document.getElementById("note-imgarea").style.visibility = "hidden";
    //     $('#change-annotation').click(function() { showImg(); });

    // }
    </script> 

   <!-- <script>
    $(document).ready(function(){
        $('.navbar-play').live('click', function(event) { 
           document.write('asidhunaklmdl,asd,saz');       
           $('.note-div').toggle('show');
       });
    });
    </script>-->
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
            <a class="navbar-play navbar-right" onClick="toggleRecording(this)" style="float:right; margin-right: -115px;">
                <img src="img/homepage/record-button.png" height=40% width=40% style="float:right; margin-top: 25px;"></span></a>
            </a>
            <span id="divtitle" style="display:inline">
                <input id="title" placeholder="Untitled Note">
                <div id = "divtitle"> 2 annotations<br>Tags: Home</div>
                
            </span>
        </nav>
        <div class="row">
            <div class="note-span">
                <div class="col-lg-8 row-textarea">
                    <div class="panel panel-annotation">
                        <div class="panel-heading">
                                Annotation #X
                        </div>
                        <!-- Annotation Body -->
                        <div class="panel-body-note">
                            <textarea id="note-textarea" placeholder="Your notes here..." resizable="false"></textarea>
                            <div id="note-imagearea">
                                <h1> Drag Image to Upload </h1>
                                <div id="holder">
                                </div> 
                                <p id="upload" class="hidden"><label>Drag & drop not supported, but you can still upload via this input field:<br><input type="file"></label></p>
                                <p id="filereader">File API & FileReader API not supported</p>
                                <p id="formdata">XHR2's FormData is not supported</p>
                                <p id="progress">XHR2's upload progress isn't supported</p>
                                <p>Drag an image from your desktop to the drop zone above to upload an image annotation.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 row-textarea sidebar">
                    <div class="panel panel-default">
                        <div id="panel-body-note">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-picture-o"></i> Submit
                                </a>
                                <a href="#" class="list-group-item" id="change-annotation" name="showText">
                                    <i class="fa fa-picture-o"></i> <span id="annotation-button-text">Add Image Annotation</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
          image.width = 400; // a fake resize
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
      holder.ondragleave = function () { this.className = '';};
      holder.ondragover = function () { this.className = 'hover'; return false; };
      holder.ondragend = function () { return false; };
      holder.ondrop = function (e) {
        this.className = '';
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


    <!-- Core Scripts - Include with every page -->

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
