<?php
include_once __DIR__  . "/../../../common/src/Service/DBconnector.php";
include_once __DIR__  ." /../Migrations/202101032345_migration_add_field_category_to_product.php";

$dbconnector = DBconnector::getInstance();
$migration = new Migrationaddfieldcategorytoproduct($dbconnector);
$migration->commit();
die('ok');
?>