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
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/profile.css">
    <style>
        body {
            background:
                linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 30%, rgba(0, 0, 0, 1) 95%, rgb(21, 1, 6) 100%),
                url(<?php echo $pfp ?>) left top no-repeat;
            background-size: cover, 50% 100%;
            background-repeat: no-repeat, no-repeat;
            font-family: 'Arimo', sans-serif;
            color: white;
            min-height: 100vh;
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
            <img src="<?php echo $pfp; ?>" alt="Logo" width="50px" height="50px" onclick="toggleAvatarHover()">
            <div id="avatarHover">
                <a href="settings.php">Settings</a>
                <a href="index.php">Logout</a>
            </div>
        </div>
    </nav>

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
            <img src="./images/logo.png" alt="Logo" width="120px" height="120px">
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
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/profile.css">
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

            <div class="logout">
                <a href="logout.php">Logout</a>
                <div class="logout-icon">
                    <i class="fa fa-sign-out"></i>
                </div>
            </div>
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
                <li><a href="#" id="active">Overview</a></li>
                <li><a href="profile_animeList.php">Anime List</a></li>
                <li><a href="#">Manga List</a></li>
                <li><a href="#">Favorites</a></li>
                <li><a href="#">Reviews</a></li>
            </ul>
        </nav>

        <div class="overview-content">
            <div class="overview-header">
                <h1>Overview</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="overview-details">
                <div class="details-item">
                    <h2>About Me</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut erat nec ligula facilisis bibendum.</p>
                </div>
                <div class="details-item">
                    <h2>Statistics</h2>
                    <p>Anime: 100 | Manga: 50</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <h1>Footer</h1>
        <pre>
            <?php
                // Display session data for debugging
                print_r($_SESSION);
            ?>
        </pre>
    </footer>
</body>
>>>>>>> 41f726397fd0129db99b02b14066303beaac1e93
</html>