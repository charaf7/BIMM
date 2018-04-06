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
    <title>Axe organisation</title>
    <link rel="stylesheet" href="skin/main.css" />
    <link rel="stylesheet" href="skin/axe.css" />

</head>

<body class="organisation">
<div class="header">
    <a class="menu" href="<?php echo $this->router->dashUsualPage();?>"> Menu </a>
    <h1 style="display:none;">BIMM</h1>
    <img class="logo" src="src/res/logo.svg" alt="logo-bimm" width="150">
    <a class="logout" href="<?php echo $this->router->profil();?>"> Profil </a>
    <a class="logout" href="<?php echo $this->router->logOut();?>"> Log out </a>
</div>

<div class="block-container axe">
    <form id="axeForm" method="post" action="<?php echo $this->router->saveAxe(2); ?>">
        <div class="questions">
            <?php foreach ($axe2 as $q){?>
                <div class="question-item">
                    <p> <?php echo $q->getQuestion();?></p>
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" data-coeff=<?php echo $q->getCoeff();?> value="0" <?php if($q->getValue() == 0) echo "checked" ?>>0
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" data-coeff=<?php echo $q->getCoeff();?> value="1" <?php if($q->getValue() == 1) echo "checked" ?>>1
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" data-coeff=<?php echo $q->getCoeff();?> value="2" <?php if($q->getValue() == 2) echo "checked" ?>>2
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" data-coeff=<?php echo $q->getCoeff();?> value="3" <?php if($q->getValue() == 3) echo "checked" ?>>3
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" data-coeff=<?php echo $q->getCoeff();?> value="4" <?php if($q->getValue() == 4) echo "checked" ?>>4
                    <input type="radio" name="<?php echo $q->getQuestionId();?>" data-coeff=<?php echo $q->getCoeff();?> value="5" <?php if($q->getValue() == 5) echo "checked" ?>>5
                </div>
            <?php }?>
        </div>
        <div class="save">
            <input id="save" type="submit" name="Sauvegarder" value="Sauvegarder">
        </div>
    </form>
    <div class="chart-container">
        <canvas id="axeChart"></canvas>
    </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/script-chart.js"></script>

</body>
</html>
