<?php
if (isset($_COOKIE["username"])) {
    header("Location: profile.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>

    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body>
    <header>
        <h1><a href="index.php">Market</a></h1>
    </header>

    <form action="login.php" method="POST">
        <h2>Вход</h2>

        <input type="text" name="login" placeholder="Введите логин" minlength="5" maxlength="32" required>
        <input type="password" name="password" placeholder="Введите пароль" minlength="5" maxlength="32" required>

        <input class="invisible" type="email" name="email" placeholder="Введите email" minlength="5" maxlength="50" autocomplete="on">
        <input class="invisible" type="password" id="last-input" placeholder="Повторите пароль" maxlength="32">

        <label class="invisible-label" for="last-input">
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == 1) {
                    echo "Неправильно набран логин или пароль!";
                } else {
                    echo "Логин или email уже зарегистрированы!";
                }
            }
            ?>
        </label>
        
        <input type="submit" value="Войти">

        <span id="helper-text">Нет профиля?</span>
        <span id="change-form">Зарегистрироваться</span>
    </form>
</body>
</html>