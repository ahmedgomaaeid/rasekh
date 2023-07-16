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

</body>

</html>
