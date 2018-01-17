<!DOCTYPE html>
<html>
<head>
    <title>BIMM </title>
    <link rel="stylesheet" href="skin/homeSkin.css" />
    <link rel="stylesheet" href="skin/signIn.css" />
</head>
<body>
<div>
    <h3>BIMM</h3>
    <form action="<?php echo $this->router->dashPage();?>" method="POST">
        <?php echo self::getFormLogInFields($builder);?>
        <button class="button"> Connexion </button>
        <br>
        <span>Vous avez pas encore un compte?</span><br>
        <a class="buttona" href="<?php echo $this->router->signInPage();?>">Créer un compte</a>
    </form>
</div>
</body>
</html>