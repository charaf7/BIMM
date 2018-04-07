<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" href="skin/main.css" />
    <link rel="stylesheet" href="skin/dashboard.css" />

</head>
<script>
    function validateForm() {
        var t = document.forms["edit"]["title"].value;
        var a = document.forms["edit"]["author"].value;
        var l = document.forms["edit"]["link"].value;
        if (t == "" || a == "" || l == "") {
            alert("all entries  must be filled out");
            return false;
        }
    }
</script>
<body>
<main>
    <div class="header">
        <h1 style="display:none;">BIMM</h1>
        <img class="logo" src="src/res/logo.svg" alt="logo-bimm" width="150">
        <a class="logout" href="<?php echo $this->router->profil();?>"> Profil </a>
        <a class="logout" href="<?php echo $this->router->logOut();?>"> Log out </a>
    </div>

        <div class="block-container dashboard">
            <div class="axeBox">
                <div class="container-image">
                    <a href="<?php echo $this->router->axe1();?>">
                        <img class="axePicto" src="src/res/picto-offre.svg" alt="picto offre" width="140">
                    </a>
                </div>
                <div class="container-info">
                    <a href="<?php echo $this->router->axe1();?>">
                        <h2>OFFRE</h2>
                    </a>
                    <p class="info-completion">Complété à <span id="axe1-completion">0</span><span>%</span></p>
                    <button class="btn btn-secondary" id="axe1-export">Exporter</button>
                </div>
            </div>

            <div class="axeBox">
                <div class="container-image">
                    <a href="<?php echo $this->router->axe2();?>">
                        <img class="axePicto" src="src/res/picto-organisation.svg" alt="picto organisation" width="140">
                    </a>
                </div>
                <div class="container-info">
                    <a href="<?php echo $this->router->axe2();?>">
                        <h2>ORGANISATION</h2>
                    </a>
                    <p class="info-completion">Complété à <span id="axe2-completion">0</span><span>%</span></p>
                    <button class="btn btn-secondary" id="axe2-export">Exporter</button>
                </div>
            </div>

            <div class="axeBox">
                <div class="container-image">
                    <a href="<?php echo $this->router->axe3();?>">
                        <img class="axePicto" src="src/res/picto-personne.svg" alt="picto personne" width="140">
                    </a>
                </div>
                <div class="container-info">
                    <a href="<?php echo $this->router->axe3();?>">
                        <h2>PERSONNE</h2>
                    </a>
                    <p class="info-completion">Complété à <span id="axe3-completion">0</span><span>%</span></p>
                    <button class="btn btn-secondary" id="axe3-export">Exporter</button>
                </div>
            </div>

            <div class="axeBox">
                <div class="container-image">
                    <a href="<?php echo $this->router->axe4();?>">
                        <img class="axePicto" src="src/res/picto-strategie.svg" alt="picto stratégie" width="140">
                    </a>
                </div>
                <div class="container-info">
                    <a href="<?php echo $this->router->axe4();?>">
                        <h2>STRATEGIE</h2>
                    </a>
                    <p class="info-completion">Complété à <span id="axe4-completion">0</span><span>%</span></p>
                    <button class="btn btn-secondary" id="axe4-export">Exporter</button>
                </div>
            </div>

            <div class="axeBox">
                <div class="container-image">
                    <a href="<?php echo $this->router->axe5();?>">
                        <img class="axePicto" src="src/res/picto-tech-inno.svg" alt="picto technologie et innovation" width="140">
                    </a>
                </div>
                <div class="container-info">
                    <a href="<?php echo $this->router->axe5();?>">
                        <h2>TECHNOLOGIE ET INNOVATION</h2>
                    </a>
                    <p class="info-completion">Complété à <span id="axe5-completion">0</span><span>%</span></p>
                    <button class="btn btn-secondary" id="axe5-export">Exporter</button>
                </div>

            </div>

            <div class="axeBox">
                <div class="container-image">
                    <a href="<?php echo $this->router->axe6();?>">
                        <img class="axePicto" src="src/res/picto-environnement.svg" alt="picto environnement" width="140">
                    </a>
                </div>
                <div class="container-info">
                    <a href="<?php echo $this->router->axe6();?>">
                        <h2>ENVIRONNEMENT</h2>
                    </a>
                    <p class="info-completion">Complété à <span id="axe6-completion">0</span><span>%</span></p>
                    <button class="btn btn-secondary" id="axe6-export">Exporter</button>
                </div>
            </div>
        </div>

</main>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/script-dashboard.js"></script>

</body>
</html>