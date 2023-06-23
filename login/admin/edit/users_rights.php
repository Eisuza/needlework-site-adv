<?php session_start();
    require_once("../../../func/db_connection.php");
    require_once("../../../func/page_data.php");
    require_once("../../../func/save_logs.php");
    $link = connect_to_db();
    $users = get_users($link);
?>
<!DOCTYPE html>
<html>
    <?php require("header_part_edit.php"); ?>
    <body>
        <?php
        if (!empty($_SESSION['user']) && $_SESSION['user'] == 'admin2451'){
            require("logout_part_edit.php");           
        ?><div class="caption"> ЗАРЕГИСТРИРОВАННЫЕ ПОЛЬЗОВАТЕЛИ</div>
        <table class="table2">
            <tr><th>Логин</th><th>Роль</th><th></th></tr>
        <?php
        foreach($users as $user): ?>
        <tr>
            <form action="edit_result.php" method="POST">
                <td><?=$user['login']?></td>
                <td><?=$user['user_type']?></td>
                <td><input type="submit" name="save" value="Просто кнопка"></td>
            </form>
        </tr>
        <?php endforeach; ?>
        </table><?php
        }
        else {
            echo 'Не достаточно прав для просмотра.';
        ?> <br><a href="/">На главную></a><?php
        }
        ?>
    </body>
</html>