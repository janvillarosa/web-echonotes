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

    <!-- SM2 core -->
    <!-- Sound Manager -->
    <script src="player/script/soundmanager2-nodebug-jsmin.js"></script>
    <script>
        soundManager.setup({
        url: 'player/swf/',
        flashVersion: 9, preferFlash: false,
        onready: function() {}});
    </script>
    <!-- Sound Manager end -->
<!-- SM2 page player -->
<link rel="stylesheet" type="text/css" href="player/page-player.css" />
<script src="player/page-player.js"></script>

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

        <nav class="navbar-toolbar" role="navigation" style="margin-bottom: 0;">
            <div style="height: 50px; width:100%; padding-right:30px;">
            <ul id="inline-playlist" class="playlist">
                <li style="height:px;vertical-align:middle;" class="songli"><a href="http://techhouse.org/~dmorris/music/mp3/single_camera_blues.mp3" class="button-exclude inline-exclude threesixty-exclude">Play note</a></li>
            </ul>
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
