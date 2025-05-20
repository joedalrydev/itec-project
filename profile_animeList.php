<<<<<<< HEAD
<?php
session_start();

$username = $_SESSION['username'];
$pfp = $_SESSION['users'][$username]['profile']['pfp'] ?? './images/logo.png';
$animeList = $_SESSION['users'][$username]['profile']['anime_list'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/animelist.css">
    <title>Profile</title>
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
            <img src="<?php echo $pfp; ?>" alt="Logo" width="50px" height="50px" onclick="toggleAvatarHover()">
            <div id="avatarHover">
                <a href="settings.php">Settings</a>
                <a href="index.php">Logout</a>
            </div>
        </div>
    </nav>

    <main>
        <div id="anime-list">
           
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


    <script>
        const animeList = <?php echo json_encode($animeList); ?>;
    </script>
    <script src="./scripts/animeList.js"></script>
</body>

=======
<?php
session_start();

$username = $_SESSION['username'];
$animeList = $_SESSION['users'][$username]['profile']['anime_list'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/animelist.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profile</title>
</head>

<body>
    <nav class="top-nav">
        <a href="profile.php"><img src="images/logo.svg" alt="Logo" width="50px" height="50px"></a>
        <ul>
            <li><a href="profile.php">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Anime List</a></li>
            <li><a href="#">Manga List</a></li>
            <li><a href="browse.php">Browse</a></li>
        </ul>
        <div class="avatar">
            <i class="fa fa-search"></i>
            <img src="images/logo.svg" alt="Logo" width="50px" height="50px">
            <p><i class="fa fa-arrow-down"></i></p>
        </div>
    </nav>

    <div class="profile-banner">
        <div class="banner-content">
            <div class="pfp"></div>
            <div class="name-wrapper">
                <h1><?php echo $username ?></h1>
            </div>
        </div>
    </div>

    <main>
        <nav class="profile-nav">
            <ul class="nav-list">
                <li><a href="profile.php">Overview</a></li>
                <li><a href="#" id="active">Anime List</a></li>
                <li><a href="#">Manga List</a></li>
                <li><a href="#">Favorites</a></li>
                <li><a href="#">Reviews</a></li>
            </ul>
        </nav>

        <div id="anime-list">
           
        </div>
    </main>


    <script>
        const animeList = <?php echo json_encode($animeList); ?>;
    </script>
    <script src="./scripts/animeList.js"></script>
</body>

>>>>>>> 41f726397fd0129db99b02b14066303beaac1e93
</html>