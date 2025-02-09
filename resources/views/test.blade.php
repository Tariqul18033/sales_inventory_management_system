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
    <form action="{{ url("/")}}/userRegister" method="post">
        @csrf
        firstname<input type="text" name="firstName"><br>
        lastname<input type="text" name="lastName"><br>
        email<input type="text" name="email"><br>
       mobile<input type="number" name="mobile"><br>
        passwoard<input type="text" name="password">
        <button type="submit">Submit</button>
    </form>


    <div>
        <?php
            $users = App\Models\User::all();
            foreach($users as $user){
                echo $user->firstName;
                echo $user->lastName;
                echo $user->email;
                echo $user->mobile;
                echo $user->password;
            }
        ?>
    </div>
</body>
</html>