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

$title = 'Spirited Away';
$genre = 'Adventure, Drama, Fantasy, Supernatural';
$maxEpisodes = '1';
$year = '2001';
$picture = './images/spirited_away.jpg';
$format = 'movie';
$pathToReserve = './reserve/spirited_away-reserve.php';
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
                url(../images/spirited_away.jpg) left top no-repeat;
            background-size: cover, 50% 100%;
            background-position: center center, left top;
            background-repeat: no-repeat, no-repeat;
        }
        .poster {
            background: url(../images/spirited_away.jpg) no-repeat center center;
            background-size: cover;
            flex-basis: 50%;
            border-radius: 20px;
        }

        @media only screen and (max-width: 480px) {
            body {
                background:
                    linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 70%, var(--color-bg1) 100%),
                    url(../images/spirited_away.jpg) center center no-repeat;
                background-size: cover;
            }
        }
    </style>
    <title>Spirited Away</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="../home.php" class="blue-text">Home</a></li>
            <li><a href="../profile_animeList.php" class="blue-text">List</a></li>
        </ul>
        <div class="avatar">
            <img src="<?php echo $pfp; ?>" alt="Logo" width="50px" height="50px" id="profilepic" onclick="toggleAvatarHover()">
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
                <a href="../settings.php">Settings</a>
                <a href="../index.php">Logout</a>
            </div>
        </div>
    </div>

    <main>
        <div class="banner"></div>
        <div class="anime-description">
            <h1>Spirited Away</h1>
            <p class="genre">Adventure, Drama, Fantasy, Supernatural</p>
            <p>
                On the way to their new home, 10-year-old Chihiro Ogino's family stumbles upon a deserted theme park.
                Intrigued, the family investigates the park, though unbeknownst to them, it is secretly inhabited by spirits who sleep by day and appear at night.
                When Chihiro's mother and father eat food from a restaurant in the street, angry spirits turn them into pigs.
                Furthermore, a wide sea has appeared between the spirit world and the human one, trapping Chihiro, the sole human, in a land of spirits.
                Luckily for her though, a mysterious boy named Haku appears, claiming to know her from the past.
                Under his instructions, Chihiro secures a job in the bathhouse where Haku works.
                With only her courage and some new found friends to aid her, Chihiro embarks on a journey to turn her parents back to their original forms and return home.
            </p>
            <button id="addToListBtn" class="button" onclick="displayModal()">Add to List <i class="fa fa-arrow-down"></i></button>
            <a href="#" class="button bookTickets">Book Tickets <i class="fa fa-arrow-right"></i></a>
            <button id="watchTrailerBtn" class="button" type="button"
                data-youtube="https://www.youtube.com/embed/ByXuk9QqQkk?autoplay=1&fs=1">
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