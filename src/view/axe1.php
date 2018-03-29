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
    <h1 style="display:none;">BIMM</h1>
    <img class="logo" src="src/res/logo.svg" alt="logo-bimm" width="150">
    <a class="logout" href="<?php echo $this->router->profil();?>"> Profil </a>
    <a class="logout" href="<?php echo $this->router->logOut();?>"> Log out </a>
</div>

<main>
    <div class="block-container">
        <form method="post" action="<?php echo $this->router->saveAxe(1); ?>">
            <div class="questions">
            <?php foreach ($axe1 as $q){?>
                <div class="q1">
                    <p> <?php echo $q->getQuestion();?></p>
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="0" <?php if($q->getValue() == 0) echo "checked" ?>>0
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="1" <?php if($q->getValue() == 1) echo "checked" ?>>1
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="2" <?php if($q->getValue() == 2) echo "checked" ?>>2
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="3" <?php if($q->getValue() == 3) echo "checked" ?>>3
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="4" <?php if($q->getValue() == 4) echo "checked" ?>>4
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" value="5" <?php if($q->getValue() == 5) echo "checked" ?>>5
                </div>
            <?php }?>
            </div>
            <div class="save">
                <input type="submit" name="Sauvegarder" value="Sauvegarder">
            </div>
        </form>
    </div>
    <div>
        <canvas id="axe1Chart"></canvas>
    </div>
    <div>
        <?php foreach ($ids as $c){?>
            <p> Question Id : <?php echo $c->getQuestionId();?></p>
            <p> text : <?php echo $c->getText();?></p>
            <p> Coeff : <?php echo $c->getCoeff();?></p>
            <hr>
        <?php }?>
    </div>
</main>

<script src="js/chart.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
