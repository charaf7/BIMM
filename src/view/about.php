<!DOCTYPE html>
<html>
<head>
	<title> Old axe</title>
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

	<div class="student">

	</div>
    <div>

    </div>
</body>
</html>