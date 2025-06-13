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
            <img src="<?php echo $pfp; ?>" alt="Logo" width="50px" height="50px" id="profilepic">
            <div id="avatarHover">
                <button id="color-toggle">Switch Color Scheme</button>
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
                <button id="color-toggle">Switch Color Scheme</button>
                <a href="settings.php">Settings</a>
                <a href="index.php">Logout</a>
            </div>
        </div>
    </div>

    <main>
        <div class="container">
            <div class="welcome">
                <img src="./images/logo.png" alt="">
                <h1 class="description">Welcome to AniMate, <span class="blue-text"><?php echo $username ?></span>!</h1>
                <h1 class="animate">AniMate</h1>
                <h2 class="purple-text">Your Ultimate Anime & Movie Companion</h2>
                <a href="#cards"><i class="fa fa-arrow-down"></i></a>

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
                        <a href="./animes/one_piece.php"><img src="./images/one-piece.jpg" alt="Poster"></a>
                        <a href="./animes/one_piece.php">One Piece</a>
                    </div>
                    <div class="card">
                        <a href="./animes/attack_on_titan.php"><img src="./images/attack_on_titan.jpg" alt="Poster"></a>
                        <a href="./animes/attack_on_titan.php">Attack on Titan</a>
                    </div>
                    <div class="card">
                        <a href="./animes/a_silent_voice.php"><img src="./images/a_silent_voice.jpg" alt="Poster"></a>
                        <a href="./animes/a_silent_voice.php">A Silent Voice</a>
                    </div>
                    <div class="card">
                        <a href="./animes/demon_slayer.php"><img src="./images/demon_slayer.jpg" alt="Poster"></a>
                        <a href="./animes/demon_slayer.php">Demon Slayer</a>
                    </div>
                    <div class="card">
                        <a href="./animes/hunter_x_hunter_2011.php"><img src="./images/hunter_x_hunter_2011.png" alt="Poster"></a>
                        <a href="./animes/hunter_x_hunter_2011.php">Hunter x Hunter 2011</a>
                    </div>
                    <div class="card">
                        <a href="./animes/kaguya_sama_love_is_war.php"><img src="./images/kaguya_sama_love_is_war.jpg" alt="Poster"></a>
                        <a href="./animes/kaguya_sama_love_is_war.php">Kaguya-sama: Love is war</a>
                    </div>
                    <div class="card">
                        <a href="./animes/my_hero_academia.php"><img src="./images/my_hero_academia.jpg" alt="Poster"></a>
                        <a href="./animes/my_hero_academia.php">My Hero Academia</a>
                    </div>
                    <div class="card">
                        <a href="./animes/your_name.php"><img src="./images/your_name.png" alt="Poster"></a>
                        <a href="./animes/your_name.php">Your Name</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cards" id="cards">
            <h1>Check it out!</h1>
            <div class="card-container">
                <div class="card">
                    <a href="./animes/a_silent_voice.php"><img src="./images/a_silent_voice.jpg" alt="Poster"></a>
                    <a href="./animes/a_silent_voice.php">A Silent Voice</a>
                </div>
                <div class="card">
                    <a href="./animes/attack_on_titan.php"><img src="./images/attack_on_titan.jpg" alt="Poster"></a>
                    <a href="./animes/attack_on_titan.php">Attack on Titan</a>
                </div>
                <div class="card">
                    <a href="./animes/classroom_of_the_elite.php"><img src="./images/classroom_of_the_elite.jpg" alt="Poster"></a>
                    <a href="./animes/classroom_of_the_elite.php">Classroom of the Elite</a>
                </div>
                <div class="card">
                    <a href="./animes/date_a_live.php"><img src="./images/date_a_live.jpg" alt="Poster"></a>
                    <a href="./animes/date_a_live.php">Date a Live</a>
                </div>
                <div class="card">
                    <a href="./animes/decadence.php"><img src="./images/decadence.png" alt="Poster"></a>
                    <a href="./animes/decadence.php">Decadence</a>
                </div>
                <div class="card">
                    <a href="./animes/demon_slayer.php"><img src="./images/demon_slayer.jpg" alt="Poster"></a>
                    <a href="./animes/demon_slayer.php">Demon Slayer</a>
                </div>
                <div class="card">
                    <a href="./animes/dororo.php"><img src="./images/dororo.jpg" alt="Poster"></a>
                    <a href="./animes/dororo.php">Dororo</a>
                </div>
                <div class="card">
                    <a href="./animes/eyeshield_21.php"><img src="./images/eyeshield_21.png" alt="Poster"></a>
                    <a href="./animes/eyeshield_21.php">Eyeshield 21</a>
                </div>
                <div class="card">
                    <a href="./animes/howls_moving_castle.php"><img src="./images/howls_moving_castle.jpg" alt="Poster"></a>
                    <a href="./animes/howls_moving_castle.php">Howls Moving Castle</a>
                </div>
                <div class="card">
                    <a href="./animes/hunter_x_hunter_2011.php"><img src="./images/hunter_x_hunter_2011.png" alt="Poster"></a>
                    <a href="./animes/hunter_x_hunter_2011.php">Hunter x Hunter 2011</a>
                </div>
                <div class="card">
                    <a href="./animes/kaguya_sama_love_is_war.php"><img src="./images/kaguya_sama_love_is_war.jpg" alt="Poster"></a>
                    <a href="./animes/kaguya_sama_love_is_war.php">Kaguya-sama: Love is war</a>
                </div>
                <div class="card">
                    <a href="./animes/kakegurui.php"><img src="./images/kakegurui.jpg" alt="Poster"></a>
                    <a href="./animes/kakegurui.php">Kakegurui</a>
                </div>
                <div class="card">
                    <a href="./animes/kuroko_no_basket.php"><img src="./images/kuroko_no_basket.jpg" alt="Poster"></a>
                    <a href="./animes/kuroko_no_basket.php">Kuroko no Basket</a>
                </div>
                <div class="card">
                    <a href="./animes/made_in_abyss.php"><img src="./images/made_in_abyss.jpg" alt="Poster"></a>
                    <a href="./animes/made_in_abyss.php">Made in Abyss</a>
                </div>
                <div class="card">
                    <a href="./animes/mashle.php"><img src="./images/mashle.png" alt="Poster"></a>
                    <a href="./animes/mashle.php">MASHLE</a>
                </div>
                <div class="card">
                    <a href="./animes/megalo_box.php"><img src="./images/megalo_box.jpg" alt="Poster"></a>
                    <a href="./animes/megalo_box.php">Megalo Box</a>
                </div>
                <div class="card">
                    <a href="./animes/mirai_nikki.php"><img src="./images/mirai_nikki.png" alt="Poster"></a>
                    <a href="./animes/mirai_nikki.php">Mirai Nikki</a>
                </div>
                <div class="card">
                    <a href="./animes/my_hero_academia.php"><img src="./images/my_hero_academia.jpg" alt="Poster"></a>
                    <a href="./animes/my_hero_academia.php">My Hero Academia</a>
                </div>
                <div class="card">
                    <a href="./animes/my_neighbor_totoro.php"><img src="./images/my_neighbor_totoro.jpg" alt="Poster"></a>
                    <a href="./animes/my_neighbor_totoro.php">My Neighbor Totoro</a>
                </div>
                <div class="card">
                    <a href="./animes/naruto.php"><img src="./images/naruto.jpg" alt="Poster"></a>
                    <a href="./animes/naruto.php">Naruto</a>
                </div>
                <div class="card">
                    <a href="./animes/one_piece.php"><img src="./images/one-piece.jpg" alt="Poster"></a>
                    <a href="./animes/one_piece.php">One Piece</a>
                </div>
                <div class="card">
                    <a href="./animes/overlord.php"><img src="./images/overlord.jpg" alt="Poster"></a>
                    <a href="./animes/overlord.php">Overlord</a>
                </div>
                <div class="card">
                    <a href="./animes/princess_mononoke.php"><img src="./images/princess_mononoke.jpg" alt="Poster"></a>
                    <a href="./animes/princess_mononoke.php">Princess Mononoke</a>
                </div>
                <div class="card">
                    <a href="./animes/ranking_of_kings.php"><img src="./images/ranking_of_kings.jpg" alt="Poster"></a>
                    <a href="./animes/ranking_of_kings.php">Ranking of Kings</a>
                </div>
                <div class="card">
                    <a href="./animes/seven_deadly_sins.php"><img src="./images/seven_deadly_sins.jpg" alt="Poster"></a>
                    <a href="./animes/seven_deadly_sins.php">Seven Deadly Sins</a>
                </div>
                <div class="card">
                    <a href="./animes/spirited_away.php"><img src="./images/spirited_away.jpg" alt="Poster"></a>
                    <a href="./animes/spirited_away.php">Spirited Away</a>
                </div>
                <div class="card">
                    <a href="./animes/spy_x_family.php"><img src="./images/spy_x_family.jpg" alt="Poster"></a>
                    <a href="./animes/spy_x_family.php">Spy x Family</a>
                </div>
                <div class="card">
                    <a href="./animes/steins_gate.php"><img src="./images/steins_gate.jpg" alt="Poster"></a>
                    <a href="./animes/steins_gate.php">Steins Gate</a>
                </div>
                <div class="card">
                    <a href="./animes/summer_time_rendering.php"><img src="./images/summer_time_rendering.png" alt="Poster"></a>
                    <a href="./animes/summer_time_rendering.php">Summer Time Rendering</a>
                </div>
                <div class="card">
                    <a href="./animes/suzume.php"><img src="./images/suzume.jpg" alt="Poster"></a>
                    <a href="./animes/suzume.php">Suzume</a>
                </div>
                <div class="card">
                    <a href="./animes/the_girl_who_leapt_through_time.php"><img src="./images/the_girl_who_leapt_through_time.png" alt="Poster"></a>
                    <a href="./animes/the_girl_who_leapt_through_time.php">The Girl Who Leapt Through Time</a>
                </div>
                <div class="card">
                    <a href="./animes/vinland_saga.php"><img src="./images/vinland_saga.jpg" alt="Poster"></a>
                    <a href="./animes/vinland_saga.php">Vinland Saga</a>
                </div>
                <div class="card">
                    <a href="./animes/weathering_with_you.php"><img src="./images/weathering_with_you.png" alt="Poster"></a>
                    <a href="./animes/weathering_with_you.php">Weathering With You</a>
                </div>
                <div class="card">
                    <a href="./animes/ya_boy_kongming.php"><img src="./images/ya_boy_kongming.jpg" alt="Poster"></a>
                    <a href="./animes/ya_boy_kongming.php">Ya Boy Kongming!</a>
                </div>
                <div class="card">
                    <a href="./animes/your_name.php"><img src="./images/your_name.png" alt="Poster"></a>
                    <a href="./animes/your_name.php">Your Name</a>
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

</html>