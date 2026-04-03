<html>

<head>
    <title>Authenticaion</title>
    <link rel="stylesheet" href="{{ asset('build/assets/style.css') }}">
</head>

<body>
    <div>
    <form action="{{ route('api-user') }}" method="get">
        @csrf
        <label for="text">user name</label>
        <input type="text" name="username">

        <label for="email">user email</label>
        <input type="email" name="useremail" id="">

        <label for="password">user password</label>
        <input type="password" name="password" id="">

        <button type="submit" class="sub">Log in </button>
    </form>
</div>
</body>
</html>


