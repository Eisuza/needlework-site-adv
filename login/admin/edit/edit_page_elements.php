<?php session_start();
require_once("../../../func/db_connection.php");
require_once("../../../func/page_data.php");
$link = connect_to_db();
$id_page = $_POST['id_page'];
$operation = $_POST['operation'];
$templates = get_templates($link, $id_page);?>

<!DOCTYPE html>
<html>
<?php
    require("header_part_edit.php");?>
    <body>
        <?php if (!empty($_SESSION['user'])){ 
            require("logout_part_edit.php");
            require("edit_selected_page_items.php");
        } else {
        echo 'Не достаточно прав для просмотра.';?>
        <br><a href="/">На главную></a>
        <?php
        }
        ?>      
    </body>
</html>

