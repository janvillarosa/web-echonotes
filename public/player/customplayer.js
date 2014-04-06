var mySound;
var position;
var timestamps;

function getTime(nMSec, bAsString) {
    // convert milliseconds to mm:ss, return as object literal or string
    var nSec = Math.floor(nMSec/1000),
        min = Math.floor(nSec/60),
        sec = nSec-(min*60);
    // if (min === 0 && sec === 0) return null; // return 0:00 as null
    return (bAsString?(min+':'+(sec<10?'0'+sec:sec)):{'min':min,'sec':sec});
}

function initSound(link){
	mySound = soundManager.createSound({
		id: 'aSound',
		url: link,
		onload: function(){
			$slider = $('#slider');

			// Get current value
			var value = $slider.data('slider').getValue();

			$slider.data('slider').max = this.duration;

			// Apply setValue to redraw slider
			$slider.slider('setValue', value);

		},
		onfinish: function(){
			document.getElementById("playButton").innerHTML = '<i class = "glyphicon glyphicon-play"></i> Play Echonote';
		},
		whileplaying: function(){
			var index = 0;
			timer.innerHTML = getTime(Math.floor(this.position),true);
			$slider = $('#slider');

			// Get current value
			var value = this.position;

			// Apply setValue to redraw slider
			$slider.slider('setValue', value);

			//Timed annotation code, check if audio position matches timestamp
			if(mySound.position==timestamps[index]){
				alert("annotate!")//samplecode
				index++;
			}
		}
	});
	$slider = $('#slider');
	$('#slider').slider()
	  .on('slide', function(ev){
	    mySound.setPosition($slider.data('slider').getValue());
	  });
}

function setTimestamp(ts){

	timestamps = ts;

}

function togglePlaying( e ) {
	mySound.togglePause();

    if (mySound.playState == 0||mySound.paused) {
    	document.getElementById("playButton").innerHTML = '<i class = "glyphicon glyphicon-play"></i> Play Echonote';
    } else {
      	document.getElementById("playButton").innerHTML = '<i class = "glyphicon glyphicon-pause"></i> Pause Echonote';
    }
}
