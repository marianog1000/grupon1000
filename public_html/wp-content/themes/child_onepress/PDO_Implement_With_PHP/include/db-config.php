<?php

$DB_host="localhost";
$DB_user="root";
$db_pass="";
$DB_name="nina";

try
{
    $db=new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$db_pass);
} catch (Exception $ex) {
echo $ex->getMessage();
}

include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/Crud.php');

$crud = new Crud($db);