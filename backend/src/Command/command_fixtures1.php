<?php
include_once __DIR__ ."/../Fixtures/Fixture02.php";
include_once __DIR__ ."/../../../common/src/Service/DBconnector.php";
$fixture =new Fixture02(DBconnector::getInstance());
$fixture->run();
die('ok');
?>