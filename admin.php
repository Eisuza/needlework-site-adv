<?php session_start();?>
<?php $id_page = 9; ?>
<?php require_once("func/save_logs.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="login/admin/admin.css">
        <title class="caption">Административная панель.</title>
        <link rel="icon" href="login/admin/admin.ico" type="image/x-icon">
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        if (!empty($_SESSION['user']) && $_SESSION['user'] == 'admin2451' ){
            save_login_admin($_SESSION['user']);
            ?>
        <div>
            <p class="text_right">Администратор: <?=$_SESSION['user'];?>
            <br><a href= "logout.php" class="text_right">Выход</a></p>
            <p class="caption">Административная панель.</p>
        </div>
        <div class="panel">
            <div class="form">
                <p class="caption">ШАБЛОНЫ</p>
                <?php require("login/admin/panel_templates.php");?>
            </div>
            <br>
            <div class="form">
                <p class="caption">СТРАНИЦЫ</p>
                <?php require("login/admin/panel_pages.php");?>
            </div>
            <br>
            <div class="form">
                <p class="caption">Пользователи и статистика</p>
                <form action="login/admin/edit/users_rights.php" method="GET">
                    <p><input type="submit" name="users_rights" class="form_button" value="Просмотреть всех"></p>
                </form>
                <form action="login/admin/edit/ip_statistics.php" method="GET">
                    <p><input type="submit" name="users_rights" class="form_button" value="Просмотреть ip отчет"></p>
                </form>
                <form action="login/admin/edit/send_list.php" method="GET">
                    <p><input type="submit" name="users_rights" class="form_button" value="Рассылка уведомлений"></p>
                </form>
            </div>
        <div>
            <?php
        }
        else {
            echo 'Не достаточно прав для просмотра.';
        ?>
            <br><a href="/">На главную></a>
        <?php
        }
        ?>
    </body>
</html>

