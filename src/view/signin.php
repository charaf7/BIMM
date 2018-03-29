<!DOCTYPE html>
<html>
<head>
	<title>Créer un compte </title>
	<link rel="stylesheet" href="skin/main.css" />
	<link rel="stylesheet" href="skin/signIn.css" />
</head>
<body>
	<div class="signin-box">
        <img src="src/res/logo.svg" alt="logo-bimm" width="300">
        <h2>Créer un compte</h2>
        <form class="signin-form" action="<?php echo $this->router->signInOk();?>" method="POST">
            <div class="input-wrapper">
                <?php echo self::getFormSignInFields($builder);?>
            </div>
            <button class="btn"> Commencer </button>
        </form>
    </div>
</body>
</html>