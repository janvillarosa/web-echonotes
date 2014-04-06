var mySound;
var position;

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
		whileplaying: function(){
			timer.innerHTML = getTime(Math.floor(this.position),true);
			$slider = $('#slider');

			// Get current value
			var value = this.position;

			// Apply setValue to redraw slider
			$slider.slider('setValue', value);

		}
	});
}

function playSound(){
	mySound.play();
}

function pauseSound(){
	mySound.pause();
}

function togglePlaying( e ) {
    if (e.classList.contains("recording")) {
        // stop recording
        mySound.pause();
        e.classList.remove("recording");
        document.getElementById("playButton").innerHTML = '<i class = "glyphicon glyphicon-play"></i> Play Echonote';
    } else {
        e.classList.add("recording");
        mySound.play();
        document.getElementById("playButton").innerHTML = '<i class = "glyphicon glyphicon-pause"></i> Pause Echonote';
        updateTime();
        
    }
}
