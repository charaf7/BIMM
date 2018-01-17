<?php
/**
 * Created by PhpStorm.
 * User: Charaf
 * Date: 12/01/2018
 * Time: 22:12
 */?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" href="skin/dashboard.css" />

</head>

<body>
<div class="header">
    <a class="menu" href="<?php echo $this->router->dashUsualPage();?>"> Menu </a>
    <h2>BIMM</h2>
    <a class="logout" href="<?php echo $this->router->profil();?>"> Profil </a>
    <a class="logout" href="<?php echo $this->router->logOut();?>"> Log out </a>
</div>

<div>
    <form method="post" action="<?php echo $this->router->saveAxe(3); ?>">
        <div class="questions">
            <?php foreach ($axe3 as $q){?>
                <div class="q1">
                    <p> <?php echo $q->getQuestion();?></p>
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="0" <?php if($q->getValue() == 0) echo "checked" ?>>0<br>
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="1" <?php if($q->getValue() == 1) echo "checked" ?>>1<br>
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="2" <?php if($q->getValue() == 2) echo "checked" ?>>2<br>
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="3" <?php if($q->getValue() == 3) echo "checked" ?>>3<br>
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="4" <?php if($q->getValue() == 4) echo "checked" ?>>4<br>
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="5" <?php if($q->getValue() == 5) echo "checked" ?>>5<br>
                </div>
            <?php }?>
        </div>
        <div class="save">
            <input type="submit" name="Sauvegarder" value="Sauvegarder">
        </div>
    </form>
</div>

</body>
</html>
