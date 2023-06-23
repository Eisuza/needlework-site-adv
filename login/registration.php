<?php
require_once("../func/db_connection.php");
require_once("../func/login.php");
$login=$_POST["login"];
$password=$_POST["password"];

$link = connect_to_db();
registration($link, $login, $password);
 ?>