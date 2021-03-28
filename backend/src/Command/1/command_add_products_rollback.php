<?php
include_once __DIR__  . "/../../../common/src/Service/DBconnector.php";
include_once __DIR__  ." /../Migrations/202103032345_migration_add_products.php";

$dbconnector = DBconnector::getInstance();
$migration = new Migrationaddproducts($dbconnector);
$migration->rollback();
die('ok');
?>