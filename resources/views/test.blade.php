<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 id="progress">JavaScript is turned off, or your browser is realllllly slow</h1>
</body>

<script>
var imageAddr = "/images/test/fortest.jpg";
var downloadSize = 4995374; //bytes
var results = []

function ShowProgressMessage(msg) {
    if (console) {
        if (typeof msg == "string") {
            console.log(msg);
        } else {
            for (var i = 0; i < msg.length; i++) {
                console.log(msg[i]);
            }
        }
    }

    var oProgress = document.getElementById("progress");
    if (oProgress) {
        var actualHTML = (typeof msg == "string") ? msg : msg.join("<br />");
        oProgress.innerHTML = actualHTML;
    }
}

function InitiateSpeedDetection() {
    ShowProgressMessage("Loading the image, please wait...");
    window.setTimeout(MeasureConnectionSpeed, 1);
};

if (window.addEventListener) {
    window.addEventListener('load', InitiateSpeedDetection, false);
} else if (window.attachEvent) {
    window.attachEvent('onload', InitiateSpeedDetection);
}

function MeasureConnectionSpeed() {
    console.log((new Date()).getTime())
    var startTime, endTime;
    var download = new Image();
    endTime = null
    download.onload = function () {
        endTime = (new Date()).getTime();
        console.log((new Date()).getTime())
        showResults();
    }

    download.onerror = function (err, msg) {
        ShowProgressMessage("Invalid image, or error downloading");
    }

    startTime = (new Date()).getTime();
    var cacheBuster = "?nnn=" + startTime;
    download.src = imageAddr + cacheBuster;

    function showResults() {
        var duration = (endTime - startTime) / 1000;
        var bitsLoaded = downloadSize * 8;
        var speedBps = (bitsLoaded / duration).toFixed(2);
        var speedKbps = (speedBps / 1024).toFixed(2);
        var speedMbps = (speedKbps / 1024).toFixed(2);
        console.log("startTime : "+startTime)
        console.log("endTime : "+endTime)
        console.log("duration : "+duration)
        console.log("bitsLoaded : "+bitsLoaded)
        console.log("speedBps : "+speedBps)
        console.log("speedKbps : "+speedKbps)
        console.log("speedMbps : "+speedMbps)
        results.push(
            {
                "speedBps":speedBps,
                "speedKbps":speedKbps,
                "speedMbps":speedMbps
            }
        )
        ShowProgressMessage([
            "Your connection speed is:",
            speedBps + " bps",
            speedKbps + " kbps",
            speedMbps + " Mbps"
        ]);
    }
}
</script>
</html>
