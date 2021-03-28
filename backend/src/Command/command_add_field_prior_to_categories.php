<?php
include_once __DIR__  . "/../../../common/src/Service/DBconnector.php";
include_once __DIR__  ." /../Migrations/202101031900_migration_add_field_prior_to_categories.php";

$dbconnector = DBconnector::getInstance();
$migration = new Migrationaddfieldpriortocategory($dbconnector);
$migration->commit();
die('ok');
?>