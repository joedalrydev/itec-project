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
</html>