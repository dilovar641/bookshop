<?php
include_once __DIR__ ."/../Fixtures/Fixture03.php";
include_once __DIR__ ."/../../../common/src/Service/DBconnector.php";
$fixture =new Fixture03(DBconnector::getInstance());
$fixture->run();
die('ok');
?>