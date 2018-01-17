<!DOCTYPE html>
<html>
<head>
	<title>Créer un compte </title>
	<link rel="stylesheet" href="skin/signIn.css" />
</head>
<body>
	<div>
			<p>Créer un compte</p>
			<form action="<?php echo $this->router->signInOk();?>" method="POST">
                <?php echo self::getFormSignInFields($builder);?>
				<button class="button"> Commencer </button>
			</form>
    </div>
</body>
</html>