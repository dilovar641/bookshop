<?php
include_once __DIR__ ."/../Fixtures/Fixture04.php";
include_once __DIR__ ."/../../../common/src/Service/DBconnector.php";
$fixture =new Fixture04(DBconnector::getInstance());
$fixture->run();
die('ok');
?>