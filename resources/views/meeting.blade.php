<!DOCTYPE html>

<head>
    <title>Meeting - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.9/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.9/css/react-select.css" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="origin-trial" content="">
    <meta name="api-key" content="{{ $key }}">
    <meta name="meeting-id" content="{{ $meetingId }}">
    <meta name="signature" content="{{ $signature }}">
    <meta name="password" content="{{ $password }}">
    <meta name="email" content="{{ $email }}">
    <meta name="name" content="{{ $name }}">
</head>

<body>
<script src="https://source.zoom.us/1.9.9/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/1.9.9/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/1.9.9/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/1.9.9/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/1.9.9/lib/vendor/lodash.min.js"></script>
<script src="https://source.zoom.us/zoom-meeting-1.9.9.min.js"></script>
<script src="{{ asset('assets/tool.js') }}"></script>
<script src="{{ asset('assets/vconsole.min.js') }}"></script>
<script src="{{ asset('assets/meeting.js') }}"></script>

<script>

</script>
</body>

</html>
