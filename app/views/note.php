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
    <link href="css/note.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/timeline.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- Sound Manager -->
    <!-- Page player core CSS -->
    <script src="player/script/soundmanager2-nodebug-jsmin.js"></script>
    <script>
        soundManager.setup({
        url: 'player/swf/',
        flashVersion: 9,
        onready: function() {}});
    </script>

    <link rel="stylesheet" type="text/css" href="player/page-player.css" />
    <link rel="stylesheet" type="text/css" href="player/optional-annotations.css" />
    <link rel="stylesheet" type="text/css" href="player/optional-themes.css" />

    <script src="player/page-player.js"></script>
    <script src="player/optional-page-player-metadata.js"></script>
    <!-- Sound Manager end -->
    <?php $note = Echonote::where('noteId', '=', $noteId)->firstOrFail();?>
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

        <nav class="navbar-toolbar" role="navigation" style="margin-bottom: 0; height: 120px">
            <li class="divider"></li>
            <div class = "navbar-panel-side">
                <button type="button" class="navbar-ctanote btn btn-default" onclick="" style="margin-top:15px;">Add New Annotation</button><br>
                <span class = "navbar-sharelinks">
                    <a href="" style="padding-right:5px; color:#2ab1d8;">Share</a>     
                    <a href = "" style="padding-left:5px; color:#2ab1d8;">Delete</a>
                </span>
            </div>
            <span id="divtitle" style="display:inline">
                <div style="width:80%;">
                <ul class="playlist" style = "height: 20px;">
                 <li>
                  <a href="<?php echo $note->audioURL;?>"><?php echo $note->noteName;?> (Click to Play)</a>
                  <div class="metadata">
                   <div class="duration">2:41</div> <!-- total track time (for positioning while loading, until determined -->
                   <ul>
                    <li><p>Timed Annotation 1</p><span>0:40</span></li>
                    <li><p>Timed Annotation 2</p><span>)0:59</span></li>
                    <li><p>Timed Annotation 3</p><span>1:40</span></li>
                    <li><p>Timed Annotation 4</p><span>2:00</span></li>
                    <li><p>Timed Annotation 5</p><span>2:20</span></li>
                   </ul>
                  </div>
                 </li>
            </div>
            </span>
        </nav>

        <div id ="page-wrapper">
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
                <ul class="timeline">
                                <li>
                                    <div class="timeline-badge info"><i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Annotation 1 (0:40)</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida ligula iaculis neque ornare vehicula. Suspendisse potenti. Nunc non porttitor massa, ac egestas felis. Sed pulvinar nibh et ornare pulvinar. Suspendisse varius sagittis mauris iaculis dictum. In est turpis, rhoncus id tristique et, consequat vel augue. Curabitur aliquet fermentum lacus sit amet congue.</p>
                                            <hr>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-cog"></i> 
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Edit Annotation</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Delete Annotation</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class = "timeline-inverted">
                                    <div class="timeline-badge info"><i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Annotation 2 (0:59)</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                            <hr>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-cog"></i> 
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Edit Annotation</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Delete Annotation</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge info"><i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Annotation 3 (1:40)</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                            <hr>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-cog"></i> 
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Edit Annotation</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Delete Annotation</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class = "timeline-inverted">
                                    <div class="timeline-badge info"><i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Annotation 4 (2:00)</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida ligula iaculis neque ornare vehicula. Suspendisse potenti. Nunc non porttitor massa, ac egestas felis. Sed pulvinar nibh et ornare pulvinar. Suspendisse varius sagittis mauris iaculis dictum. In est turpis, rhoncus id tristique et, consequat vel augue. Curabitur aliquet fermentum lacus sit amet congue.</p>
                                            <hr>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-cog"></i> 
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Edit Annotation</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Delete Annotation</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge info"><i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Annotation 5 (2:20)</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                            <hr>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-cog"></i> 
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Edit Annotation</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Delete Annotation</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
