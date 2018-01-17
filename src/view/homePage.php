<!DOCTYPE html>
<html>
<head>
	<title> Old axes</title>
	<link rel="stylesheet" href="skin/homeSkin.css" />
    <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">

        <a href="<?php echo $this->router->homePage();?>"><img src="src/res/logo.png"></a>

        <?php if(key_exists('username',$_SESSION)){
            echo '<a class="logout" href="'.$this->router->logOut().'"> Log out </a>';
            echo '<a class="dashboard" href="'.$this->router->dashUsualPage().'"> dashboard </a>';
                }else{
            echo '<a class="login" href="'.$this->router->logInPage().'"> Log in </a>';
        }?>
    </div>

	<div class="container">
		<div class="ident">
			<p>Add your own favourite old music to our show case </p>
			<form action="<?php echo $this->router->signInPage(); ?>" method="POST">
				<button class="button"> Sign in </button>
			</form>
		</div>

		<div class="list">
			<p>Open the show case and visit our collection</p>
			<form action="<?php echo $this->router->collectionPage(); ?>" method="POST">
				<button class="button"> Open the show case </button>
			</form>
		</div>
	</div>

    <div class="footer"><a class="about" href="<?php echo $this->router->about(); ?>"> About </a></div>
</body>
</html>