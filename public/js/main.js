/*Stopwatch*/

var timestamp;

var Stopwatch = function(elem, options) {
  
  var timer       = createTimer(),
      startButton = createButton("start", start),
      stopButton  = createButton("stop", stop),
      resetButton = createButton("reset", reset),
      offset,
      clock,
      interval;
  var test = 1;
  
  // default options
  options = options || {};
  options.delay = options.delay || 1;
 
  // append elements     
  elem.appendChild(timer);
  
  // initialize
  reset();
  
  // private functions
  function createTimer() {
    var timer = document.createElement("span");
    timer.id = "timer";
    return timer;
  }
  
  function createButton(action, handler) {
    var a = document.createElement("a");
    a.href = "#" + action;
    a.innerHTML = action;
    a.addEventListener("click", function(event) {
      handler();
      event.preventDefault();
    });
    return a;
  }
  
  function start() {
    offset   = Date.now();
    interval = setInterval(update, options.delay);
  }
  
  function stop() {
    if (interval) {
      clearInterval(interval);
    }
  }
  
  function reset() {
    clock = 0;
    render(0);
  }
  
  function update() {
    clock += delta();
    render();
  }
  
  function render() {
    timer.innerHTML = getTime(Math.floor(clock),true); 
    timestamp = Math.floor(clock/1000);
  }
  
  function delta() {
    var now = Date.now(),
        d   = now - offset;
    
    offset = now;
    return d;
  }
  
  // public API
  this.start  = start;
  this.stop   = stop;
  this.reset  = reset;
};


// Prepare Timer
var d = document.getElementById("test-timer");
var Timer = new Stopwatch(d, {delay: 1000});


/* Copyright 2013 Chris Wilson

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/

window.AudioContext = window.AudioContext || window.webkitAudioContext;

var audioContext = new AudioContext();
var audioInput = null,
    realAudioInput = null,
    inputPoint = null,
    audioRecorder = null;
var rafID = null;
var analyserContext = null;
var canvasWidth, canvasHeight;
var recIndex = 0;

/* TODO:

- offer mono option
- "Monitor input" switch
*/

function saveAudio() {
    audioRecorder.exportWAV( doneEncoding );
    // could get mono instead by saying
    // audioRecorder.exportMonoWAV( doneEncoding );
}

function gotBuffers( buffers ) {
    var canvas = document.getElementById( "wavedisplay" );

    drawBuffer( canvas.width, canvas.height, canvas.getContext('2d'), buffers[0] );

    // the ONLY time gotBuffers is called is right after a new recording is completed - 
    // so here's where we should set up the download.
    audioRecorder.exportWAV( doneEncoding );
}

function doneEncoding( blob ) {
    Recorder.setupDownload( blob, "myRecording" + ((recIndex<10)?"0":"") + recIndex + ".wav" );
    recIndex++;
}

var annotations = [];
var timestamps = [];
var nextTimestamp = 0;
var duration;

var timeFunc;
var tagTimestamp = function() {
    nextTimestamp = timestamp;
    timeFunc = function() {
      if(document.getElementById('note-textarea').value == ""){
        nextTimestamp = timestamp;
        timeFunc = tagTimestamp;
      }
    }
};

timeFunc = tagTimestamp;

var aIndex = 0;
var recording = false;

/*TOGGLE RECORDING*/
function toggleRecording( e ) {
    if (e.classList.contains("recording")) {
        // stop recording
        recording = false;
        audioRecorder.stop();
        duration = timestamp;
        Timer.stop();
        e.classList.remove("recording");
        audioRecorder.exportWAV( uploadFile );

        //audioRecorder.getBuffers( gotBuffers );
    } else {
        // start recording
        Timer.reset();
        Timer.start();
        if (!audioRecorder)
            return;
        e.classList.add("recording");
        audioRecorder.clear();
        audioRecorder.record();
        recording = true;
        document.getElementById("recordButton").innerHTML = "<i class='fa fa-stop'></i> <span> Stop Recording</span>";
    }
}

/*UPLOAD RECORDING*/
function uploadFile( blob ){
    var title = document.getElementById('title').value;
    var tags = [];
    form = new FormData(),
    request = new XMLHttpRequest();

    form.append("title", title);
    form.append("blob", blob , title);
    form.append("duration", duration);

    form.append("annotation_count", aIndex);
    for(var i = 0; i < aIndex; i++){
      form.append("annotations["+i+"]", annotations[i]);
      form.append("timestamps["+i+"]", timestamps[i]);
    }

    if(document.getElementById('homeTag').checked == true){
      tags.push("Home");
    }
    if(document.getElementById('schoolTag').checked == true){
      tags.push("School");
    }
    if(document.getElementById('workTag').checked == true){
      tags.push("Work");
    }
    if(document.getElementById('personalTag').checked == true){
      tags.push("Personal");
    }
    if(document.getElementById('businessTag').checked == true){
      tags.push("Business");
    }
    if(document.getElementById('miscellaneousTag').checked == true){
      tags.push("Mischellaneous");
    }

    form.append("tCount", tags.length);
    for(var i = 0; i < tags.length; i++){
      form.append("tags["+i+"]", tags[i]);
    }

    $.ajax({
                url: "/record/upload",
                type: 'POST',
                processData: false,
                contentType: false,
                data: form,
                success: function(msg) {
                  alert(msg);
                  window.location = "/";
                },
                error: function (xhr, ajaxOptions, thrownError) {
                  alert(xhr.status);
                  alert(thrownError);
                  alert(xhr.responseText);
                }
    });
}

function getTime(nMSec, bAsString) {
    // convert milliseconds to mm:ss, return as object literal or string
    var nSec = Math.floor(nMSec/1000),
        min = Math.floor(nSec/60),
        sec = nSec-(min*60);
    // if (min === 0 && sec === 0) return null; // return 0:00 as null
    return (bAsString?(min+':'+(sec<10?'0'+sec:sec)):{'min':min,'sec':sec});
};

function createAnnotationCard(){

    var card = document.createElement("div");
    card.className = "box box-default";
    var heading = document.createElement("div");
    heading.className = "box-header";
    var body = document.createElement("div");
    body.className = "box-footer";
    var content = document.createElement("div");
    content.className = "box-body annotation-body";

    content.innerHTML = document.getElementById('edit').value;
    heading.innerHTML = "<h1 class='box-title annotation-title'>Annotation " +aIndex +"</h1>" + "<div class='box-tools pull-right'><div class='time-label'><i class='fa fa-clock-o'></i> "+ getTime(timestamp*1000,true) + "</div>";
    body.appendChild(content);
    card.appendChild(heading);
    card.appendChild(body);

    document.getElementById("notelist").appendChild(card);
}

function removeNotification(){
  document.getElementById("notifs").innerHTML = "";
  document.getElementById("notifs-head").innerHTML = "You have no new notifications";
  document.getElementById("notif-bage").innerHTML = "";
}

function submitAnnotation(){
    if(recording == true){
      var cusid_ele = document.getElementsByClassName('froala-element f-basic');
      var item = cusid_ele[0];

      annotations.push(item.innerHTML);
      timestamps.push(timestamp);
      aIndex = aIndex + 1;

      createAnnotationCard();

      item.innerHTML = '';
      timeFunc = tagTimestamp;
    }
}

function convertToMono( input ) {
    var splitter = audioContext.createChannelSplitter(2);
    var merger = audioContext.createChannelMerger(2);

    input.connect( splitter );
    splitter.connect( merger, 0, 0 );
    splitter.connect( merger, 0, 1 );
    return merger;
}

function cancelAnalyserUpdates() {
    window.cancelAnimationFrame( rafID );
    rafID = null;
}

function updateAnalysers(time) {
    if (!analyserContext) {
        var canvas = document.getElementById("analyser");
        canvasWidth = canvas.width;
        canvasHeight = canvas.height;
        analyserContext = canvas.getContext('2d');
    }

    // analyzer draw code here
    {
        var SPACING = 3;
        var BAR_WIDTH = 1;
        var numBars = Math.round(canvasWidth / SPACING);
        var freqByteData = new Uint8Array(analyserNode.frequencyBinCount);

        analyserNode.getByteFrequencyData(freqByteData); 

        analyserContext.clearRect(0, 0, canvasWidth, canvasHeight);
        analyserContext.fillStyle = '#F6D565';
        analyserContext.lineCap = 'round';
        var multiplier = analyserNode.frequencyBinCount / numBars;

        // Draw rectangle for each frequency bin.
        for (var i = 0; i < numBars; ++i) {
            var magnitude = 0;
            var offset = Math.floor( i * multiplier );
            // gotta sum/average the block, or we miss narrow-bandwidth spikes
            for (var j = 0; j< multiplier; j++)
                magnitude += freqByteData[offset + j];
            magnitude = magnitude / multiplier;
            var magnitude2 = freqByteData[i * multiplier];
            analyserContext.fillStyle = "hsl( " + Math.round((i*360)/numBars) + ", 100%, 50%)";
            analyserContext.fillRect(i * SPACING, canvasHeight, BAR_WIDTH, -magnitude);
        }
    }
    
    rafID = window.requestAnimationFrame( updateAnalysers );
}

function toggleMono() {
    if (audioInput != realAudioInput) {
        audioInput.disconnect();
        realAudioInput.disconnect();
        audioInput = realAudioInput;
    } else {
        realAudioInput.disconnect();
        audioInput = convertToMono( realAudioInput );
    }

    audioInput.connect(inputPoint);
}

function gotStream(stream) {
    inputPoint = audioContext.createGain();

    // Create an AudioNode from the stream.
    realAudioInput = audioContext.createMediaStreamSource(stream);
    audioInput = realAudioInput;
    audioInput.connect(inputPoint);

//    audioInput = convertToMono( input );

    analyserNode = audioContext.createAnalyser();
    analyserNode.fftSize = 2048;
    inputPoint.connect( analyserNode );

    audioRecorder = new Recorder( inputPoint );

    zeroGain = audioContext.createGain();
    zeroGain.gain.value = 0.0;
    inputPoint.connect( zeroGain );
    zeroGain.connect( audioContext.destination );
    updateAnalysers();
}

function initAudio() {
        if (!navigator.getUserMedia)
            navigator.getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
        if (!navigator.cancelAnimationFrame)
            navigator.cancelAnimationFrame = navigator.webkitCancelAnimationFrame || navigator.mozCancelAnimationFrame;
        if (!navigator.requestAnimationFrame)
            navigator.requestAnimationFrame = navigator.webkitRequestAnimationFrame || navigator.mozRequestAnimationFrame;

    navigator.getUserMedia({audio:true}, gotStream, function(e) {
            alert('Error getting audio');
            console.log(e);
        });
}

function getBufferCallback( buffers ) {
    var newSource = audioContext.createBufferSource();
    var newBuffer = audioContext.createBuffer( 2, buffers[0].length, audioContext.sampleRate );
    newBuffer.getChannelData(0).set(buffers[0]);
    newBuffer.getChannelData(1).set(buffers[1]);
    newSource.buffer = newBuffer;

    newSource.connect( audioContext.destination );
    newSource.start(0);
}

window.addEventListener('load', initAudio );
