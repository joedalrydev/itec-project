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
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
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
                    <a href="#"><img src="./images/attack_on_titan.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/a_silent_voice.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/demon_slayer.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/hunter_x_hunter_2011.png" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/kaguya_sama_love_is_war.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/kuroko_no_basket.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/my_hero_academia.jpg" alt="poster"></a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="./images/naruto.jpg" alt="poster"></a>
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
                <img src="./images/poeple.png" alt="checkmark">
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
        <div class="logo-wrapper">
            <img src="./images/logo.png" alt="Logo" class="logo">
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
    <script>
        const originalColors = {
            '--color-main-bg1': 'rgba(5, 24, 52, 1)',
            '--color-main-bg2': 'rgb(46, 21, 109)',
            '--color-blue': '#67ebff',
            '--color-gradient-start': '#0fb5ce',
            '--color-gradient-end': '#6d3ee4',
            '--color-bg1': '#281558',
            '--color-bg2': '#043a42',
            '--color-login-1': '#67ebff',
            '--color-login-2': '#1e90ff',
            '--color-purple-accent': '#a259ff',
            '--color-bg-gradient1': '#0a6a79',
            '--color-bg-gradient2': '#3c237c'
        };
        const redColors = {
            '--color-main-bg1': '#661d1d',
            '--color-main-bg2': '#4e1818',
            '--color-blue': '#ff864a',
            '--color-gradient-start': '#ff3131',
            '--color-gradient-end': '#ff914d',
            '--color-bg1': '#ff3131',
            '--color-bg2': '#ff914d',
            '--color-login-1': '#eb3328',
            '--color-login-2': '#ff864a',
            '--color-purple-accent': '#eb3328',
            '--color-bg-gradient1': '#8f2828',
            '--color-bg-gradient2': '#692402'
        };
        const greenColors = {
            '--color-main-bg1': '#1e490b',
            '--color-main-bg2': '#5aab70',
            '--color-blue': '#7ed957',
            '--color-gradient-start': '#0097b2',
            '--color-gradient-end': '#7ed957',
            '--color-bg1': '#0097b2',
            '--color-bg2': '#7ed957',
            '--color-login-1': '#5aab70',
            '--color-login-2': '#7ed957',
            '--color-purple-accent': '#5aab70',
            '--color-bg-gradient1': '#204d0d',
            '--color-bg-gradient2': '#305a3b'
        };

        const colorSchemes = {
            original: originalColors,
            red: redColors,
            green: greenColors
        };

        function applyColors(colors) {
            for (const [key, value] of Object.entries(colors)) {
                document.documentElement.style.setProperty(key, value);
            }
        }

        let currentScheme = localStorage.getItem('colorScheme') || 'original';
        applyColors(colorSchemes[currentScheme]);
        document.getElementById('logo').src = scheme === 'original' ? `./images/logo.png` : `./images/logo-${scheme}.png`;
        document.querySelectorAll('.logo').forEach(function(logo) {
            logo.src = scheme === 'original' ? `./images/logo.png` : `./images/logo-${scheme}.png`;
        });
    </script>
</body>

</html>