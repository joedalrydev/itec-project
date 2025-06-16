<?php
session_start();
include("database.php");

$username = $_SESSION['username'];
$sql = $conn->prepare("SELECT title, genre, episodes, max_episodes, year, status, score, picture, format, path_to_reserve FROM anime_list WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();

$animeList = [];
while ($row = $result->fetch_assoc()) {
    $animeList[] = $row;
}

$sql = $conn->prepare("SELECT pfp FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
$pfpPath = $row['pfp'];
$pfp = "." . $pfpPath;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
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
            <li><a href="profile_animeList.php" class="blue-text">List</a></li>
            <li><a href="browse.php" class="blue-text">Reserve</a></li>
        </ul>
        <div class="avatar">
            <img src="<?php echo $pfp; ?>" alt="Logo" width="50px" height="50px" id="profilepic">
            <div id="avatarHover">
                <button class="color-toggle original" data-scheme="original"></button>
                <button class="color-toggle red" data-scheme="red"></button>
                <button class="color-toggle green" data-scheme="green"></button>
                <a href="settings.php">Settings</a>
                <a href="index.php">Logout</a>
            </div>
        </div>
    </nav>

    <div id="menu">
        <i class="fa fa-bars"></i>
    </div>

    <div id="menu-sidebar">
        <div class="menu-content">
            <div class="menu-header">
                <img src="./images/logo.png" alt="Logo" class="logo">
                <img src="<?php echo $pfp; ?>" alt="Logo" width="75px" height="75px">
                <h2><?php echo $username ?></h2>
            </div>
            <ul>
                <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                <li><a href="profile_animeList.php"><i class="fa fa-list"></i>List</a></li>
                <li><a href="browse.php"><i class="fa fa-ticket"></i>Reserve</a></li>
            </ul>
            <div class="menu-footer">
                <div class="buttons">
                    <button class="color-toggle original" data-scheme="original"></button>
                    <button class="color-toggle red" data-scheme="red"></button>
                    <button class="color-toggle green" data-scheme="green"></button>
                </div>
                <a href="settings.php"><i class="fa fa-cog"></i>Settings</a>
                <a href="index.php"><i class="fa fa-sign-out"></i>Logout</a>
            </div>
        </div>
    </div>

    <main>
        <p class="searchBtn">Search <i class="fa fa-search"></i></p>
        <input type="text" placeholder="Search for title..." id="searchBar">
        <div id="anime-list">
           
        </div>
    </main>

    <footer>
        <div class="logo-wrapper">
            <img src="./images/logo.png" alt="Logo" width="75px" height="75px" class="logo">
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
    <script src="./scripts/script.js"></script>
    <script>
        const searchBtn = document.querySelector('.searchBtn');
        const searchBar2 = document.getElementById('searchBar');

        searchBtn.onclick = function () {
            searchBar2.style.display = "block";
            searchBtn.style.display = "none";
        }
    </script>
</body>
</html>