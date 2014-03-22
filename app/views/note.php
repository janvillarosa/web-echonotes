<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Untitled Note - Echonotes</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/Framework/bootstrap.min.css" rel="stylesheet">
    <link href="css/froala_editor.min.css" rel="stylesheet">

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

        <nav class="navbar-toolbar" role="navigation" style="margin-bottom: 0; height: 65px">
            <li class="divider"></li>
                <button type="button" class="navbar-play btn btn-default" onclick="toggleRecording(this)" style="float:right;">New Annotation</button>
            <span id="divtitle" style="display:inline">
                <input id="title" placeholder="Untitled Note">
                <div class="stopwatch" id="test-timer"></div>
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

        <div class="note-span">
                <div class="col-lg-8 row-textarea note-card">
                    <div class="panel panel-annotation" style = "position: relative;">
                        <div class="panel-body-note">
                          <div id="note-textarea" style="margin: 20px 20px">
                            <section id="editor">
                              <textarea id='edit'></textarea>
                            </section>
                          </div>
                          <div id="note-imagearea">
                                <div id="holder">
                                  <h1 style = "text-align:center;"> Drag Image to Upload</h1>
                                </div> 
                                <p id="upload" class="hidden"><label>Drag & drop not supported, but you can still upload via this input field:<br><input type="file"></label></p>
                                <p id="filereader">File API & FileReader API not supported</p>
                                <p id="formdata">XHR2's FormData is not supported</p>
                                <p id="progress">XHR2's upload progress isn't supported</p>
                          </div>
                        </div>
                      <div class = "panel-submit">
                            <button type="button" class="btn btn-default" onclick="submitAnnotation()" style="right:10px">Edit Annotation</button>
                      </div>
                    </div>
                </div>
              </div>
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

        <script>
    $(function(){
      $('#edit').editable({ inlineMode: true, buttons: ['bold', 'italic', 'strikeThrough', 'fontSize', 'color', 'sep', 
        'formatBlock', 'align', 'insertOrderedList', 'insertUnorderedList', 'outdent', 'indent', 'sep',
        'undo', 'redo'],   })
      });
    </script>

        <script src="js/audiodisplay.js"></script>
        <script src="js/main.js"></script>
        <script src="js/froala_editor.min.js"></script>
        <script src="js/h5utils.js"></script>


    </body>

    </html>
