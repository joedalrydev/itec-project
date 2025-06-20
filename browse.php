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
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/browse.css">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Browse</title>
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
                <div class="buttons">
                    <button class="color-toggle original" data-scheme="original"></button>
                    <button class="color-toggle red" data-scheme="red"></button>
                    <button class="color-toggle green" data-scheme="green"></button>
                </div>
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
        <div class="filter-anime">
            <div class="filter">
                <h3 class="blue-text">Genres</h3>
                <select name="genre" id="genre" onchange="filterAnime()">
                    <option value="Any">Any</option>
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Drama">Drama</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Horror">Horror</option>
                    <option value="Romance">Romance</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                </select>
            </div>
            <div class="filter">
                <h3 class="blue-text">Year</h3>
                <select name="year" id="year" onchange="filterAnime()">
                    <option value="Any">Any</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                </select>
            </div>
            <div class="filter">
                <h3 class="blue-text">Format</h3>
                <select name="format" id="format" onchange="filterAnime()">
                    <option value="Any">Any</option>
                    <option value="tv">TV Show</option>
                    <option value="movie">Movie</option>
                </select>
            </div>
        </div>

        <input type="text" placeholder="Search for title..." id="searchBar">

        <h1 id="text">Reserve it now!</h1>
        <div id="anime-list-container">

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
    <script src="./scripts/browse.js"></script>
    <script src="./scripts/script.js"></script>
</body>
</html>