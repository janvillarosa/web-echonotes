<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> New Echonote - Echonotes</title>

    <link href="css/Framework/bootstrap.min.css" rel="stylesheet">
    <link href="css/froala_editor.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="css/record.css" rel="stylesheet">


    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/froala_editor.min.js"></script>
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
    </script>
</head>

<body>

    <div id="wrapper" style="position: fixed">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a href="/" class="navbar-brand" style="color:white">
                  <img src="img/homepage/echonotes-logo.png" height=32% width=32%>
                </a>
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
            <a href="#" class="navbar-play navbar-right" onClick="toggleRecording(this)" style="float:right; margin-right: -115px;">
                <img src="img/homepage/record-button.png" height=40% width=40% style="float:right; margin-top: 25px;"></span></a>
            </a>
            <span id="divtitle" style="display:inline">
                <input id="title" placeholder="Untitled Note">
                <div id = "divtitle"> 2 annotations<br>Tags: Home</div>
                
            </span>
        </nav>

        <div class="stopwatch" id="test-timer"></div>

        <div class="row">
            <div class="note-span">
                <div class="col-lg-8 row-textarea note-card">
                    <div class="panel panel-annotation">
                        <!-- <div class="panel-heading">
                                Annotation #X
                        </div> -->
                        <!-- Annotation Body -->
                        <div class="panel-body-note">
                          <div id="note-textarea">
                          <section id="editor">
                          <textarea id='edit'>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis diam in odio iaculis blandit. Nunc eu mauris sit amet purus viverra gravida ut a dui. Vivamus nec rutrum augue, pharetra faucibus purus. Maecenas non orci sagittis, vehicula lorem et, dignissim nunc. Suspendisse suscipit, diam non varius facilisis, enim libero tincidunt magna, sit amet iaculis eros libero sit amet eros. Vestibulum a rhoncus felis. Nam lacus nulla, consequat ac lacus sit amet, accumsan pellentesque risus. Aenean viverra mi at urna mattis fermentum. Curabitur porta metus in tortor elementum, in semper nulla ullamcorper. Vestibulum mattis tempor tortor quis gravida. In rhoncus risus nibh. Nullam condimentum dapibus massa vel fringilla. Sed hendrerit sed est quis facilisis. Ut sit amet nibh sem. Pellentesque imperdiet mollis libero.</p>

          <p><a href="http://google.com" title="Aenean sed hendrerit">Aenean sed hendrerit</a> velit. Nullam eu mi dolor. Maecenas et erat risus. Nulla ac auctor diam, non aliquet ante. Fusce ullamcorper, ipsum id tempor lacinia, sem tellus malesuada libero, quis ornare sem massa in orci. Sed dictum dictum tristique. Proin eros turpis, ultricies eu sapien eget, ornare rutrum ipsum. Pellentesque eros nisl, ornare nec ipsum sed, aliquet sollicitudin erat. Nulla tincidunt porta vehicula.</p>

          <p>Nullam laoreet imperdiet orci ac euismod. Curabitur vel lectus nisi. Phasellus accumsan aliquet augue, eu rutrum tellus iaculis in. Nunc viverra ultrices mollis. Curabitur malesuada nunc massa, ut imperdiet arcu lobortis sed. Cras ac arcu mauris. Maecenas id lectus nisl. Donec consectetur scelerisque quam at ultricies. Nam quis magna iaculis, condimentum metus ut, elementum metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus id tempus nisi.</p>
      </textarea>
  </section>
</div>
                          <div id="note-imagearea">
                                <div id="holder" style = "vertically-align:middle;">
                                  <h1 style = "text-align:center;"> Drag Image to Upload</h1>
                                </div> 
                                <p id="upload" class="hidden"><label>Drag & drop not supported, but you can still upload via this input field:<br><input type="file"></label></p>
                                <p id="filereader">File API & FileReader API not supported</p>
                                <p id="formdata">XHR2's FormData is not supported</p>
                                <p id="progress">XHR2's upload progress isn't supported</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 row-textarea sidebar">
                    <div class="panel panel-default">
                        <div id="panel-body-note">
                            <div class="list-group">
                                <a href="#" class="list-group-item" onclick="submitAnnotation()">
                                    <i class="fa fa-picture-o"></i>Go
                                </a>
                                <a href="#" class="list-group-item" id="change-annotation" name="showText">
                                    <i class="fa fa-picture-o"></i> <span id="annotation-button-text">Add</span>
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

    <script>
    $(function(){
      $('#edit').editable({ inlineMode: false, buttons: ['bold', 'italic', 'strikeThrough', 'fontSize', 'color', 'sep', 
        'formatBlock', 'align', 'insertOrderedList', 'insertUnorderedList', 'outdent', 'indent', 'sep',
        'undo', 'redo'],   })
      });
    </script>
    <!-- Core Scripts - Include with every page -->

        <!--<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>-->


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
