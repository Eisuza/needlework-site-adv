<?php
session_start();
if ($_SESSION['user'] == "admin2451"){
    header("Location:/admin.php");
}
else{
    header("Location:/index.php");
}
?>