<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lancelot&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Mythic Scans</title>
</head>

<body>
    <header id="navbar">
        <div class="navbar-left">
            <a href="index.php"><img src="./public/img/logo.png" alt="Mythic Scans" class="logo"></a>
        </div>
        <nav id="navbar-center">
            <a href="index.php" class="active">Accueil</a>
            <a href="#">Genres</a>
            <a href="#">Nouveautés</a>
            <a href="#">Forum</a>
        </nav>
        <div id="navbar-right">
            <button class="button"><img src="./public/img/search.svg" alt="Search"></button>
            <button class="button theme-toggle" id="themeToggle">
                <img src="./public/img/moon.svg" alt="Theme" id="themeIcon">
            </button>
            <img id="avatar" src="./public/img/avatar.svg" alt="Profile">
            
        </div>
        <button id="burger"><img src="./public/img/menu.svg" alt="menu" />
    </button>
    </header>


    <main>
        <!-- Section Genres -->
        <section id="genres">
            <h2>Genres</h2>
            <article>
                <a href="#"><img src="./public/img/Webtoon.svg" alt="Webtoon"></a>
                <a href="#"><img src="./public/img/Manga.svg" alt="Manga"></a>
                <a href="#"><img src="./public/img/LN.svg" alt="Light Novel"></a>
            </article>
        </section>

        <!-- Section Nouveautés -->
        <section id="Nouveau">
            <h2>Nouveautés</h2>
            <?php foreach ($types as $id_type => $type_name): ?>
                <article>
                    <h3><?= htmlspecialchars($type_name) ?>s</h3>
                    <div>
                        <?php if (!empty($series[$id_type])): ?>
                            <?php foreach ($series[$id_type] as $s): ?>
                                <figure>
                                    <a href="#">
                                        <img src="<?= htmlspecialchars($s->getCoverImage()) ?>" alt="<?= htmlspecialchars($s->getTitle()) ?>">
                                    </a>
                                    <figcaption><?= htmlspecialchars($s->getTitle()) ?></figcaption>
                                </figure>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

        <!-- Section Les plus populaires -->
        <section class="carousel-section">
            <h2>Les plus populaires</h2>
            <div class="carousel">
                <a href="" class="carousel-item"><img src="./public/img/Webtoon/Infinite.svg" alt="Infinite Mage"></a>
                <a href="" class="carousel-item"><img src="./public/img/LN/TBATE.svg" alt="The Beginning After The End"></a>
                <a href="" class="carousel-item"><img src="./public/img/LN/Danmachi.svg" alt="Danmachi"></a>
                <a href="" class="carousel-item"><img src="./public/img/LN/SAO.svg" alt="Sword Art Online"></a>
                <a href="" class="carousel-item"><img src="./public/img/Webtoon/Revenge.svg" alt="Revenge of The Iron-Blooded ..."></a>
                <a href="" class="carousel-item"><img src="./public/img/Webtoon/Wind.svg" alt="Wind Breaker"></a>
                <a href="" class="carousel-item"><img src="./public/img/Manga/Black.svg" alt="Black Clover"></a>
                <a href="" class="carousel-item"><img src="./public/img/Manga/One.svg" alt="One Piece"></a>
                <a href="" class="carousel-item"><img src="./public/img/Webtoon/Solo.svg" alt="Solo Leveling"></a>
                <a href="" class="carousel-item"><img src="./public/img/Manga/Black.svg" alt="Black Clover"></a>
            </div>
        </section>
    </main>

    <footer>
        <section id="reseau">
            <a href="#"><img src="./public/img/X.svg" alt="X"></a>
            <a href="#"><img src="./public/img/Instagram.svg" alt="Instagram"></a>
            <a href="#"><img src="./public/img/Discord.svg" alt="Discord"></a>
        </section>
        <section id="contact">
            <a href="">Nous Contacter</a>
        </section>
        <section id="Mentions">
            <a href="">Mentions légales</a>
        </section>
    </footer>

    <script src="./public/js/main.js"></script>
</body>

</html>