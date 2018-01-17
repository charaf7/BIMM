<?php

set_include_path("./src");
require_once("model/BimmStorageDB.php");
require_once("Router.php");

$pdo= new PDO('mysql:host=localhost;port=0;dbname=bimm;charset=utf8',
              'root',
			  '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$bimm= new BimmStorageDB($pdo);


//Set no caching
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$r = new Router();
$r->main($bimm);

?>
