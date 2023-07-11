<!DOCTYPE html>

<head>
    <title>Zoom WebSDK</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.9.7/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.9.7/css/react-select.css" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="origin-trial" content="">
</head>

<body id="body">
    <button id="btn-start-recording" style="z-index:1000; position:fixed; color:white;">Start Recording</button>
    <button id="btn-stop-recording" style="z-index:1000; position:fixed; color:white; left:300px;" disabled>Stop Recording</button>
    <canvas id="background-canvas" style="position:absolute; top:-99999999px; left:-9999999999px;"></canvas>
    <script src="{{route('index')}}/zoom/RecordRTC.js"></script>
    <script src="https://www.webrtc-experiment.com/html2canvas.min.js"></script>
    <script>
        var role = 1;
        window.addEventListener('DOMContentLoaded', function(event) {
            console.log('DOM fully loaded and parsed');
            websdkready(role);
        });

    </script>
    <script src="https://source.zoom.us/2.9.7/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/2.9.7/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/2.9.7/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/2.9.7/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/2.9.7/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-2.9.7.min.js"></script>
    <script src="{{route('index')}}/zoom/js/tool.js"></script>
    <script src="{{route('index')}}/zoom/js/vconsole.min.js"></script>
    <script src="{{route('index')}}/zoom/js/meeting.js"></script>
    <script>
        var elementToRecord = document.getElementById('body');
        var canvas2d = document.getElementById('background-canvas');
        var context = canvas2d.getContext('2d');

        canvas2d.width = elementToRecord.clientWidth;
        canvas2d.height = elementToRecord.clientHeight;

        var isRecordingStarted = false;
        var isStoppedRecording = false;

        setInterval(function looper() {
            if (!isRecordingStarted) {
                return;
            }

            html2canvas(elementToRecord).then(function(canvas) {
                context.clearRect(0, 0, canvas2d.width, canvas2d.height);
                context.drawImage(canvas, 0, 0, canvas2d.width, canvas2d.height);

                if (isStoppedRecording) {
                    return;
                }
            });
        }, 16.67); // 1000ms / 60fps = 16.67ms

        var recorder = new RecordRTC(canvas2d, {
            type: 'canvas'
            , video: {
                width: 1280
                , height: 720
            }
        });

        document.getElementById('btn-start-recording').onclick = function() {
            this.disabled = true;

            isStoppedRecording = false;
            isRecordingStarted = true;

            recorder.startRecording();
            document.getElementById('btn-stop-recording').disabled = false;
        };

        document.getElementById('btn-stop-recording').onclick = function() {
            this.disabled = true;

            recorder.stopRecording(function() {
                isRecordingStarted = false;
                isStoppedRecording = true;

                var blob = recorder.getBlob();
                var url = URL.createObjectURL(blob);
                var a = document.createElement('a');
                document.body.appendChild(a);
                a.style = 'display: none';
                a.href = url;
                a.download = 'recorded-video.webm';
                a.click();
                window.URL.revokeObjectURL(url);
            });
        };

    </script>
</body>

</html>
