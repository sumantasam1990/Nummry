var Timer = require("easytimer.js").Timer;

var timerInstance = new Timer();

var hours = getCookie('hours');
var minutes = getCookie('minutes');
var seconds = getCookie('seconds');

if(isNaN(parseFloat(seconds)) === false && seconds > 0) {
    var hr = hours;
    var min = minutes;
    var sec = seconds;
} else {
    var hr = "0";
    var min = "0";
    var sec = "0";
}

timerInstance.start({callback: function (timer) {

    document.cookie = "hours=" + timer.getTimeValues().toString(['hours']) + "; path=/;";
    document.cookie = "minutes=" + timer.getTimeValues().toString(['minutes']) + "; path=/;";
    document.cookie = "seconds=" + timer.getTimeValues().toString(['seconds']) + "; path=/;";

    // console.log(timer.getTimeValues().toString(['hours', 'minutes', 'seconds']))
    },

    startValues: {hours: hr, minutes: min, seconds: sec},
});


timerInstance.addEventListener("secondsUpdated", function (e) {
    $("#timer").html(timerInstance.getTimeValues().toString());
});

const pause = document.getElementById('pause_time');
const resume = document.getElementById('resume_time');

pause.addEventListener('click', e => {
    timerInstance.pause();
    $("#pause_time").hide();
    $("#resume_time").fadeIn();
    $(":submit").attr("disabled", true);
});

resume.addEventListener('click', e => {
    timerInstance.start();
    $("#pause_time").fadeIn();
    $("#resume_time").hide();
    $(":submit").removeAttr("disabled");
});

// get cookie

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}
