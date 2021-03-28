<?php
include_once __DIR__  . "/../../../common/src/Service/DBconnector.php";
include_once __DIR__  ." /../Migrations/202101032121_migration_add_field_city_to_shop.php";

$dbconnector = DBconnector::getInstance();
$migration = new Migrationaddcitytoshop($dbconnector);
$migration->commit();
die('ok');
?>