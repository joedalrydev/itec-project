<?php
session_start();
include("../database.php");

$username = $_SESSION['username'];
$sql = $conn->prepare("SELECT pfp FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
$pfpPath = isset($row['pfp']) && !empty($row['pfp']) ? $row['pfp'] : '../images/logo.png';
$pfp = ".." . $pfpPath;

$title = 'Steins;Gate';
$genre = 'Drama, Psychological, Sci-Fi, Thriller';
$maxEpisodes = '24';
$year = '2011';
$picture = './images/steins_gate.jpg';
$format = 'tv';
$pathToReserve = './reserve/steins_gate-reserve.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/anime.css">
    <style>
        body {
            background:
                linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 70%, var(--color-bg1) 100%),
                url(../images/steins_gate.jpg) left top no-repeat;
            background-size: cover, 50% 100%;
            background-position: center center, left top;
            background-repeat: no-repeat, no-repeat;
        }
        .poster {
            background: url(../images/steins_gate.jpg) no-repeat center center;
            background-size: cover;
            flex-basis: 50%;
            border-radius: 20px;
        }

        @media only screen and (max-width: 480px) {
            body {
                background:
                    linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 70%, var(--color-bg1) 100%),
                    url(../images/steins_gate.jpg) center center no-repeat;
                background-size: cover;
            }
        }
    </style>
    <title>Steins;Gate</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="../home.php" class="blue-text">Home</a></li>
            <li><a href="../profile_animeList.php" class="blue-text">List</a></li>
        </ul>
        <div class="avatar">
            <div id="avatarHover">
                <button class="color-toggle original" data-scheme="original"></button>
                <button class="color-toggle red" data-scheme="red"></button>
                <button class="color-toggle green" data-scheme="green"></button>
                <a href="../settings.php">Settings</a>
                <a href="../index.php">Logout</a>
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
                <li><a href="../home.php">Home</a></li>
                <li><a href="../profile.php">Profile</a></li>
                <li><a href="../profile_animeList.php">List</a></li>
                <li><a href="../browse.php">Reserve</a></li>
            </ul>
            <div class="menu-footer">
                <button class="color-toggle original" data-scheme="original"></button>
                <button class="color-toggle red" data-scheme="red"></button>
                <button class="color-toggle green" data-scheme="green"></button>
            </div>
        </div>
    </div>

    <main>
        <div class="banner"></div>
        <div class="anime-description">
            <h1>Steins;Gate</h1>
            <p class="genre">Drama, Psychological, Sci-Fi, Thriller</p>
            <p>
                Self-proclaimed mad scientist Okabe Rintarou lives in a small room in Akihabara, where he invents "future gadgets" with fellow lab members Shiina Mayuri, his air-headed childhood friend, and Hashida Itaru, an otaku hacker. 
                The three pass the time by tinkering with their latest creation, a "Phone Microwave" that can be controlled through text messages.

                The lab members soon face a string of mysterious incidents that lead to a game-changing discovery: the Phone Microwave can send emails to the past and thus alter history. 
                Adapted from the critically acclaimed visual novel by 5pb. and Nitroplus, Steins;Gate takes Okabe to the depths of scientific theory and human despair as he faces the dire consequences of changing the past.
            </p>
            <button id="addToListBtn" class="button" onclick="displayModal()">Add to List <i class="fa fa-arrow-down"></i></button>
            <a href="#" class="button bookTickets">Book Tickets <i class="fa fa-arrow-right"></i></a>
            <button id="watchTrailerBtn" class="button" type="button"
                data-youtube="https://www.youtube.com/embed/uMYhjVwp0Fk?autoplay=1&fs=1">
                Watch Trailer
            </button>
        </div>

        <div id="addToListModal" class="modal">
            <div class="modal-content">
                <div class="poster"></div>
                <div class="setContent">
                    <span class="close">&times;</span>
                    <h2>Add to Your Anime List</h2>
                    <form id="addToListForm" action="addToList.php" method="POST">
                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value="Watching">Watching</option>
                            <option value="Completed">Completed</option>
                            <option value="On-hold">On Hold</option>
                            <option value="Dropped">Dropped</option>
                            <option value="Plan-to-Watch">Plan to Watch</option>
                        </select>
                        <br><br>
                        <label for="score">Score:</label>
                        <input type="number" id="score" name="score" min="1" max="10" placeholder="1-10" required>
                        <br><br>
                        <label for="episodes">Episodes Watched:</label>
                        <input type="number" id="episodes" name="episode" min="0" max="<?php echo htmlspecialchars($maxEpisodes); ?>" value="0" required>
                        <br><br>
                        <input type="hidden" name="title" value="<?php echo htmlspecialchars($title); ?>">
                        <input type="hidden" name="genre" value="<?php echo htmlspecialchars($genre); ?>">
                        <input type="hidden" name="maxEpisodes" value="<?php echo htmlspecialchars($maxEpisodes); ?>">
                        <input type="hidden" name="year" value="<?php echo htmlspecialchars($year); ?>">
                        <input type="hidden" name="picture" value="<?php echo htmlspecialchars($picture); ?>">
                        <input type="hidden" name="format" value="<?php echo htmlspecialchars($format); ?>">
                        <input type="hidden" name="pathToReserve" value="<?php echo htmlspecialchars($pathToReserve); ?>">
                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="trailerModal" class="modal">
            <div class="modal-content trailer-modal-content">
                <span class="close" id="closeTrailerModal">&times;</span>
                <div class="trailer-video-wrapper">
                    <iframe id="trailerIframe"
                        width="100%" height="100%" 
                        src="" 
                        frameborder="0"
                        allow="autoplay; encrypted-media; fullscreen"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </main>

    <script>
        const animeList = <?php echo json_encode($animeList); ?>;
    </script>
    <script src="../scripts/script.js"></script>
</body>

</html>