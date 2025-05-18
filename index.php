<?php
session_start();
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
    <link rel="stylesheet" href="./styles/index.css">
    <title>Landing Page</title>
</head>
<body>
    <div class="hero-section">
        <div class="hero-content">
            <img src="./images/logo.png" alt="Logo" id="logo">
            <div class="hero-text">
                <h1>THE ULTIMATE ANIME AND MOVIE COMPANION</h1>
                <p class="blue-text">Keep track of your favorites , book tickets, and enjoy watching - all in one place.</p>
            </div>  
            <div class="sign-in">
                <a href="login.php" id="sign-in">SIGN IN</a>
                <a href="register.php" id="register">REGISTER</a>
            </div>
        </div>
    </div>

    <main>
        <h1>Trending</h1>
        <div class="trending">
            <div class="prevBtn">
                <i class="fa fa-arrow-left"></i>
            </div>
            <div class="card-container">
                <div class="anime-card">
                <a href="#"><img src="./images/one-piece.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/one-piece.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/one-piece.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/one-piece.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/background.png" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/one-piece.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/one-piece.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/one-piece.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/one-piece.jpg" alt="poster"></a>
                </div>
            </div>  
            <div class="nextBtn">
                <i class="fa fa-arrow-right"></i>
            </div>
        </div>

        <h1>Make it yours</h1>
        <div class="content-wrapper">
            <div class="content-card">
                <h2>Add your favorites to your list</h2>
                <p>
                    Easily add your favorite anime and movies to your personal list.
                    Organize what you love, what you’re watching, and what’s coming next.
                </p>
                <img src="./images/checkmark.png" alt="checkmark">
            </div>
            <div class="content-card">
                <h2>Watch online anytime</h2>
                <p>Enjoy your favorite titles from anywhere with instant access to online streaming — no hassle, just hit play.</p>
                <img src="./images/wifi.png" alt="wifi">
            </div>
            <div class="content-card">
                <h2>Reserve tickets and seats</h2>
                <p>Join discussions, share your thoughts, and get recommendations from fellow fans around the world.</p>
                <img src="./images/logo.png" alt="checkmark">
             </div>
            <div class="content-card">
                <h2>Reserve tickets and seats</h2>
                <p>Plan ahead! Reserve movie tickets and select your preferred seats for upcoming anime and movie screenings.</p>
                <img src="./images/calendar.png" alt="calendar">
            </div>
        </div>
        <p class="blue-text">Customize your experience with personalized settings — from display themes to how you sort and rate your favorites.</p>
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
    <script src="./scripts/carousel.js"></script>
</body>
</html>
