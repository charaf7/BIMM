<!DOCTYPE html>
<html>
<head>
    <title>Sign in </title>
    <link rel="stylesheet" href="skin/homeSkin.css" />
    <link rel="stylesheet" href="skin/signIn.css" />
</head>
<body>
<div>
    <p>Sign in here</p>
    <form action="<?php echo $this->router->signInOk();?>" method="POST">
        <input type="text" name="username" placeholder="enter an username"><br>
        <input type="password" name="password" placeholder="enter a password"><br><br>
        <button class="button"> sign in </button>
    </form>
</div>
</body>
</html>