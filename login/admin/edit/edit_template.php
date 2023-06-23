<?php session_start();
    require_once("../../../func/db_connection.php");
    require_once("../../../func/page_data.php");
    require_once("../../../func/save_logs.php");
?>
<!DOCTYPE html>
<html>
    <?php require("header_part_edit.php"); ?>
    <body>
        <?php
        if (!empty($_SESSION['user'])){
            require("logout_part_edit.php");
            require("edit_all_elements.php");
        }
        else {
            echo 'Не достаточно прав для просмотра.';
        ?> <br><a href="/">На главную></a><?php
        }
        ?>
    </body>
</html>