<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="form_styles.css">
</head>
<body>
    <form action="login/registration.php" method="POST" class="form">
    <h2 class="form_title">Регистрация</h2>

    <div class="form_group">
        <input type="text" class="form_input" name="login">
        <label class="form_label">Логин</label>
    </div>

    <div class="form_group">
        <input type="password" class="form_input" name="password">
        <label class="form_label">Пароль</label>
    </div>
    <input type="submit" value="Зарегистрироваться" name="tryin" class="form_button"></input>
</form>
</body>
</html>