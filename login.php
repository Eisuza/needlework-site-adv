<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="form_styles.css">
</head>
<body>
    <form action="login/processing.php" method="POST" class="form">
    <h2 class="form_title">Войти</h2>

    <div class="form_group">
        <input type="text" class="form_input" name="login">
        <label class="form_label">Логин</label>
    </div>

    <div class="form_group">
        <input type="password" class="form_input" name="password">
        <label class="form_label">Пароль</label>
    </div>
    <input type="submit" value="Войти" name="tryin" class="form_button"></input>
    <input type="radio" value="1" name = "remember">Запомнить</input>
    <input type="radio" value="0" checked name = "remember">Чужой компьютер</input>
</form>
</body>
</html>