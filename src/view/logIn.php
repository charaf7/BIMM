<!DOCTYPE html>
<html>
<head>
    <title>BIMM </title>
    <link rel="stylesheet" href="skin/main.css" />
    <link rel="stylesheet" href="skin/homeSkin.css" />
    <link rel="stylesheet" href="skin/logIn.css" />
</head>
<body>
<div class="login-box">
    <h1 style="display: none">BIMM</h1>
    <img src="src/res/logo.svg" alt="logo-bimm" width="300">
    <form class="login-form" action="<?php echo $this->router->dashPage();?>" method="POST">
        <?php echo self::getFormLogInFields($builder);?>
        <button class="btn btn-login"> Connexion </button>
        <p>Vous n'avez pas encore de compte?</p>
        <a class="btn btn-link" href="<?php echo $this->router->signInPage();?>">Créer un compte</a>
    </form>
</div>
</body>
</html>