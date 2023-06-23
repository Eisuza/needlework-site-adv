<?php
session_start();
if (!empty($_SESSION['user'])){
    echo 'Добро пожаловать пользователь ' . $_SESSION['user'] . ' !';
    ?>
    <br><a href= "logout.php">Выход</a>
    <?php
}
else {
    echo 'Не достаточно прав для просмотра.';
    ?>
    <br><a href="/">На главную></a>
    <?php
}
?>