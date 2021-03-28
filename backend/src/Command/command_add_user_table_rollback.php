<?php
include_once __DIR__  . "/../../../common/src/Service/DBconnector.php";
include_once __DIR__  ." /../Migrations/202102061441_migration_add_user_table.php";

$dbconnector = DBconnector::getInstance();
$migration = new Migrationaddusertable($dbconnector);
$migration->rollback();
die('ok');
?>