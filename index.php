<? require_once("find_goods.php"); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Market</h1>

        <nav>
            <ul>
                <ol><a href="auth.php">Профиль</a></ol>
            </ul>
        </nav>
    </header>

    <main>
    <? for ($i = 0; $i < $count_goods; $i++) { ?>
        <div>
            <h4><? echo $name[$i]; ?></h4>
            <p>Цена: <? echo $price[$i]; ?> $</p>
            <a href="add_to_cart.php?add=<? echo $id[$i]; ?>">Добавить в корзину</a>
        </div>
    <? } ?>
    </main>
</body>
</html>