<html>
<head>
    <title>Authenticaion</title>
    <link rel="stylesheet" href="{{ asset('build/assets/style.css') }}">
</head>

<body>
    
    <div class="cont">
        <button type="button" onclick="window.location='{{ route('user.login') }}'"> Login </button>
        <button type="button" onclick="window.location='{{ route('user.signin') }}'"> signup </button>
    </div>

    <script src="{{ asset('build/assets/main.js') }}"></script>
</body>
</html>