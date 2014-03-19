<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Note #1</title>

  <script src="js/h5utils.js"></script></head>

  <!-- Core CSS - Include with every page -->
  <link href="css/Framework/bootstrap.min.css" rel="stylesheet">

  <!-- Page Level CSS - Include with every page -->
  <link href="css/homepage.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
</head>

<body>

  <div class="note-div">
   <div class="note-img-div">
    <div>
      <h1> Drag Image to Upload </h1>
      <article>
        <div id="holder">
        </div> 
        <p id="upload" class="hidden"><label>Drag & drop not supported, but you can still upload via this input field:<br><input type="file"></label></p>
        <p id="filereader">File API & FileReader API not supported</p>
        <p id="formdata">XHR2's FormData is not supported</p>
        <p id="progress">XHR2's upload progress isn't supported</p>
        <!--<p>Upload progress: <progress id="uploadprogress" min="0" max="100" value="0">0</progress></p>-->
        <p>Drag an image from your desktop to the drop zone above to upload an image annotation.</p>
      </article>
    </div>
  </div>
</div>

<style>
#holder { border: 10px dashed #ccc; width: 700px; min-height: 300px; margin: 20px auto;}
#holder.hover { border: 10px dashed #13a37f; }
#holder img { display: block; margin: 10px auto; }
#holder p { margin: 10px; font-size: 14px; }
progress { width: 100%; }
progress:after { content: '%'; }
.fail { background: #c00; padding: 2px; color: #fff; }
.hidden { display: none !important;}
</style>

<script>
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
      image.width = 500; // a fake resize
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
  debugger;
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
    debugger;
  //holder.ondragenter = function () { this.className = 'hover';};
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

</body>
</html>