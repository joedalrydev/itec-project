<<<<<<< HEAD
<?php
session_start();

$username = $_SESSION['username'];
$pfp = isset($_SESSION['users'][$username]['profile']['pfp']) ? $_SESSION['users'][$username]['profile']['pfp'] : './images/logo.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Lilita One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/home.css">
    <title>Home</title>
</head>
<body>
    <nav>
        <a href="home.php"><img src="./images/logo.png" alt="Logo" id="logo"></a>
        <ul>
            <li><a href="home.php" class="blue-text">Home</a></li>
            <li><a href="profile.php" class="blue-text">Profile</a></li>
            <li><a href="profile_animeList.php" class="blue-text">List</a></li>
            <li><a href="browse.php" class="blue-text">Reserve</a></li>
        </ul>
        <div class="avatar">
            <i class="fa fa-search"></i>
            <img src="<?php echo $pfp; ?>" alt="Logo" width="50px" height="50px" onclick="toggleAvatarHover()">
            <div id="avatarHover">
                <a href="settings.php">Settings</a>
                <a href="index.php">Logout</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="welcome">
                <h1>Welcome to AniMate, <span class="blue-text"><?php echo $username ?></span>!</h1>
                <h2 class="purple-text">Your Ultimate Anime & Movie Companion</h2>

                <p>
                    <span class="blue-text">Track your Anime</span>
                    - Continue watching your favorite series or start a new one.
                    Add movies, rate it, and build your personal anime library.
                </p>
                <p>
                    <span class="blue-text">Manage your Movie List</span>
                    - Keep tabs on anime films you've watched or plan to watch.
                </p>
                <p>
                    <span class="blue-text">Book Tickets with Ease</span>
                    - Browse upcoming anime screenings in cinemas and theatres near you.
                    Reserve your seat in just a few clicks!
                </p>
                <p>
                    <span class="blue-text">Favorites in One Place</span>
                    - Access your customized list of favorite series and movies anytime.
                </p>
            </div>

            <div class="trending">
                <h2>Trending</h2>
                <div class="trending-cards">
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cards">
            <h2>Check it out!</h2>
            <div class="card-container">
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="logo">
            <img src="./images/logo.png" alt="Logo" width="75px" height="75px">
            <p>&copy; JAJ.AniMate</p>
        </div>
        <div class="footer-content">
            <p class="blue-text">AniMate is your free anime and movie companion—no ads, no hassle.</p>
            <p>
                Watch trailers, track your favorite anime series and movies, and manage your personal watchlist—all in one place.
                You can also book cinema or theatre tickets for upcoming anime shows and reserve your seats in advance.
                With thousands of anime titles to explore, AniMate makes it easy to stay connected to what you love.
            </p>
        </div>
    </footer>

    <script src="./scripts/script.js"></script>
</body>
=======
<?php
session_start();

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Lilita One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/home.css">
    <title>Home</title>
</head>
<body>
    <nav>
        <a href="home.php"><img src="./images/logo.png" alt="Logo" id="logo"></a>
        <ul>
            <li><a href="home.php" class="blue-text">Home</a></li>
            <li><a href="profile.php" class="blue-text">Profile</a></li>
            <li><a href="browse.php" class="blue-text">List</a></li>
            <li><a href="#" class="blue-text">Reserve</a></li>
        </ul>
        <div class="avatar">
            <i class="fa fa-search"></i>
            <img src="images/logo.png" alt="Logo" width="50px" height="50px">
            <p><i class="fa fa-arrow-down"></i></p>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="welcome">
                <h1 class="blue-text">Welcome to AniMate, <?php echo $username ?>!</h1>
                <h2 class="purple-text">Your Ultimate Anime & Movie Companion</h2>

                <p>
                    <span class="blue-text">Track your Anime</span>
                    - Continue watching your favorite series or start a new one.
                    Add movies, rate it, and build your personal anime library.
                </p>
                <p>
                    <span class="blue-text">Manage your Movie List</span>
                    - Keep tabs on anime films you've watched or plan to watch.
                </p>
                <p>
                    <span class="blue-text">Book Tickets with Ease</span>
                    - Browse upcoming anime screenings in cinemas and theatres near you.
                    Reserve your seat in just a few clicks!
                </p>
                <p>
                    <span class="blue-text">Favorites in One Place</span>
                    - Access your customized list of favorite series and movies anytime.
                </p>
            </div>

            <div class="trending">
                <h2>Trending</h2>
                <div class="trending-cards">
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                    <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cards">
            <h2>Check it out!</h2>
            <div class="card-container">
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
                <div class="card">
                        <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                        <a href="#">Title</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="logo">
            <img src="./images/logo.png" alt="Logo" width="125px" height="125px">
            <p>&copy; JAJ.AniMate</p>
        </div>
        <div class="footer-content">
            <p class="blue-text">AniMate is your free anime and movie companion—no ads, no hassle.</p>
            <p>
                Watch trailers, track your favorite anime series and movies, and manage your personal watchlist—all in one place.
                You can also book cinema or theatre tickets for upcoming anime shows and reserve your seats in advance.
                With thousands of anime titles to explore, AniMate makes it easy to stay connected to what you love.
            </p>
        </div>
    </footer>
</body>
>>>>>>> 41f726397fd0129db99b02b14066303beaac1e93
</html>