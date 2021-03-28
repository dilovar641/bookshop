<?php
include_once __DIR__  . "/../../../common/src/Service/DBconnector.php";
include_once __DIR__  ." /../Migrations/202102061542_migration_add_rbac.php";

$dbconnector = DBconnector::getInstance();
$migration = new Migrationaddrbac($dbconnector);
$migration->commit();
die('ok');
?>