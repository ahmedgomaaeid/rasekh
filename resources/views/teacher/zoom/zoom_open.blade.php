<!DOCTYPE html>

<head>
    <title>Zoom WebSDK</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.9.7/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.9.7/css/react-select.css" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

<body>

<script src="https://source.zoom.us/2.9.7/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/2.9.7/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/2.9.7/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/2.9.7/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/2.9.7/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-2.9.7.min.js"></script>
    <script src="{{route('index')}}/zoom/js/tool.js"></script>
    <script src="{{route('index')}}/zoom/js/vconsole.min.js"></script>
    <script>
    ZoomMtg.preLoadWasm();
    var SDK_KEY = "{{$meeting->teacher->zoom_integration->client_id}}";
    var SDK_SECRET = "{{$meeting->teacher->zoom_integration->client_secret}}";
    var integration = {
        mn: {{$meeting->meeting_id}},
        name: "{{Auth::guard('teacher')->user()->name}}",
        email: "{{Auth::guard('teacher')->user()->email}}",
        role: 1,
    };
        
    var meetingConfig = testTool.getConfig(integration);
    
    var signature = ZoomMtg.generateSDKSignature({
      meetingNumber: meetingConfig.mn,
      sdkKey: SDK_KEY,
      sdkSecret: SDK_SECRET,
      role: meetingConfig.role,
      success: function (res) {
        console.log(res.result);
        meetingConfig.signature = res.result;
        meetingConfig.sdkKey = SDK_KEY;
        var joinUrl =
          "{{route('teacher.meeting')}}?" +
          testTool.serialize(meetingConfig);
        window.location.href = joinUrl;
        
      },
    });
    </script>
</body>

</html>