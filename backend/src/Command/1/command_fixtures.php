<?php
include_once __DIR__ . "/../Fixtures/Fixture01.php";
 include_once __DIR__ . "/../../../common/src/Service/DBconnector.php";

 
$fixture = new Fixture01(DBconnector::getInstance());
$fixture->run();
die('ok');
?>