<?php
if (!isset($_COOKIE["username"])) {
    header("Location: auth.php");
    exit;
}
require_once("find_user_goods.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>

    <link rel="stylesheet" href="style.css">
    <script src="cart.js" defer></script>
</head>
<body>
    <header>
        <h1><a href="index.php">Market</a></h1>

        <h2>Здравствуйте, <? echo $_COOKIE["username"]; ?>!</h2>

        <h3><a href="logout.php">Выйти из профиля</a></h3>
    </header>

    <main>
        <? for ($i = 0; $i < $count_user_goods; $i++) { ?>
            <div>
                <h4><? echo $name[$i]; ?></h4>
                <p>Цена: <span><? echo $price[$i]; ?></span> $</p>
                <p>Количество: <span><? echo $count[$i]; ?></span></p>
            </div>
        <? } ?>
    </main>
</body>
</html>