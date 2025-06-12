<?php
session_start();
include("database.php");

$username = $_SESSION['username'];
$sql = $conn->prepare("SELECT pfp FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
$pfpPath = isset($row['pfp']) && !empty($row['pfp']) ? $row['pfp'] : './images/logo.png';
$pfp = "." . $pfpPath;
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
    <link rel="stylesheet" href="./styles/profile.css">
    <style>
        body {
            background:
                linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 75%, rgb(48, 25, 105) 100%),
                url(<?php echo $pfp ?>) left top no-repeat;
            background-size: cover, 50% 100%;
            background-repeat: no-repeat, no-repeat;
            font-family: 'Arimo', sans-serif;
            color: white;
            min-height: 100vh;
        }

        @media only screen and (max-width: 480px) {
            body {
                background:
                    linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 75%, rgb(48, 25, 105) 100%),
                    url(<?php echo $pfp ?>) center center no-repeat;
                background-size: cover;
            }
            main {
                flex-direction: column;
            }
            .pfp {
                height: 50%;
                min-height: 300px;
            }
            .profile-description {
                padding: 2em;
            }
            .profile-description h1 {
                font-size: 2.5em;
            }
            .profile-description p {
                font-size: 1.4em;
            }
            .profile-description a {
                font-size: 1.5em;
                padding: 0.2em 1em;
            }
        }
    </style>
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
            <i class="fa fa-search"></i>
            <img src="<?php echo $pfp; ?>" alt="Logo" width="50px" height="50px" onclick="toggleAvatarHover()" id="profilepic">
            <div id="avatarHover">
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
                <span id="close">&times;</span>
                <img src="<?php echo $pfp; ?>" alt="Logo" width="75px" height="75px">
                <h2 class="blue-text"><?php echo $username ?></h2>
            </div>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="profile_animeList.php">List</a></li>
                <li><a href="browse.php">Reserve</a></li>
            </ul>
            <div class="menu-footer">
                <a href="settings.php">Settings</a>
                <a href="index.php">Logout</a>
            </div>
        </div>
    </div>

    <main>
        <div class="pfp"></div>
        <div class="profile-description">
            <h1>Hi <span class="blue-text"><?php echo $username ?></span>!</h1>
            <p>
                We're so glad you're here. Thank you for taking the time to visit and explore our site.
                Your presence means a lot to us, and we truly appreciate your support.
                We hope you enjoy your experience, find what you're looking for, and maybe even discover something new.
                Feel free to look around and make yourself at home. Here's to a great time ahead!
            </p>
            <div class="change-profile">
                <a href="settings.php">Change Profile</a>
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

</html>