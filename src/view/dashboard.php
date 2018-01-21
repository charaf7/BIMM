<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
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
    <div class="header">
        <h1 style="display:none;">BIMM</h1>
        <img class="logo" src="src/res/logo.svg" alt="logo-bimm" width="150">
        <a class="logout" href="<?php echo $this->router->profil();?>"> Profil </a>
        <a class="logout" href="<?php echo $this->router->logOut();?>"> Log out </a>
    </div>

    <main>
        <div class="axeBox">
            <div class="axeLink">
                <a href="<?php echo $this->router->axe1();?>"> AXE1</a>
            </div>
        </div>

        <div class="axeBox">
            <div class="axeLink">
                <a href="<?php echo $this->router->axe2();?>"> AXE2</a>
            </div>
        </div>

        <div class="axeBox">
            <div class="axeLink">
                <a href="<?php echo $this->router->axe3();?>"> AXE3</a>
            </div>
        </div>

        <div class="axeBox">
            <div class="axeLink">
                <a href="<?php echo $this->router->axe4();?>"> AXE4</a>
            </div>
        </div>

        <div class="axeBox">
            <div class="axeLink">
                <a href="<?php echo $this->router->axe5();?>"> AXE5</a>
            </div>
        </div>

        <div class="axeBox">
            <div class="axeLink">
                <a href="<?php echo $this->router->axe6();?>"> AXE6</a>
            </div>
        </div>

    </main>

</body>
</html>