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
    <form method="post" action="<?php echo $this->router->updateAccount($user->getEmail()); ?>">
        <div class="profil">
            <label for="nom">Nom*</label>
            <input type="text" name="nom" value="<?php echo $user->getNom(); ?>" />

            <label for="prenom">Prénom*</label>
            <input type="text" name="prenom" value="<?php echo $user->getPrenom(); ?>">

            <label for="entreprise">Entreprise*</label>
            <input type="text" name="entreprise" value="<?php echo $user->getEntreprise(); ?>">

            <label for="email">Email*</label>
            <input type="text" name="email" value="<?php echo $user->getEmail(); ?>">

            <label for="fonction">Fonction*</label>
            <input type="text" name="fonction" value="<?php echo $user->getFunction(); ?>">

            <label for="siret">SIRET*</label>
            <input type="text" name="siret" value="<?php echo $user->getSiret(); ?>">

            <input type="submit" name="Sauvegarder" value="Sauvegarder">
        </div>
    </form>
</div>

</body>
</html>
