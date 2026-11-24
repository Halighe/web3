<?php
require __DIR__ . "\db.php";

$stmt = "SELECT id, title, path, description FROM materials";
$result = $pdo->prepare($stmt);
$result->execute();
// while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//  print_r($row);
// }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой первый сайт</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-block">
                <div>
                    <img class="header-logo" src="img/y300.webp" alt="логотип">
                </div>
                <div>
                    <nav>
                        <ul>
                            <li>Обо мне</li>
                            <li>Мои проекты</li>
                            <li>Контакты</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <h1>Обо мне</h1>
            <p>
                Основанный в 1956 году, Липецкий Политех сегодня – это прогрессивный научно-образовательный центр,
                который
                успешно сочетает традиции инженерного вуза с современными тенденциями и разнообразием образовательных
                программ.
            </p>
            <p>
                Университет охватывает широкий спектр областей знаний и предлагает образовательные программы от
                металлургии,
                машиностроения, нанотехнологий и архитектуры до гуманитарных наук. Выпускники университета вносят
                значительный вклад в различные отрасли экономики и общественной жизни региона.
            </p>
        </div>
    </main>
    <div>
        <div class="container">
            <div class="cards">
                 <?php foreach ($result as $material): ?>
                <article class="card">
                    <img class="card-img" src="/web3/<?= $material['path'] ?>" alt="фото товара">
                    <h3><?= $material['title'] ?></h3>
                    <p><?= $material['description'] ?></p>
                    <a href="/web3/detail.php?id=<?= $material['id'] ?>">Подробнее</a>
                    <!-- <button class="card-btn">Подробнее</button> -->
                </article>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
</body>

</html>