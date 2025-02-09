<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
    <title>Document</title>
</head>
<body>
    <form action="{{ url("/")}}/user-login" method="post">
        @csrf
        email<input type="text" name="email"><br>
        passwoard<input type="text" name="password">
        <button type="submit">Submit</button>
    </form>



</body>
</html>