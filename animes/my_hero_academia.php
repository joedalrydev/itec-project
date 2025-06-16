<?php
session_start();
include("../database.php");

$username = $_SESSION['username'];
$sql = $conn->prepare("SELECT pfp FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
$pfpPath = $row['pfp'];
$pfp = ".." . $pfpPath;

$title = 'My Hero Academia';
$genre = 'Action, Adventure, Comedy';
$maxEpisodes = '159';
$year = '2016';
$picture = './images/my_hero_academia.jpg';
$format = 'tv';
$pathToReserve = './reserve/my_hero_academia-reserve.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/anime.css">
    <style>
        body {
            background:
                linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 70%, var(--color-bg1) 100%),
                url(../images/my_hero_academia.jpg) left top no-repeat;
            background-size: cover, 50% 100%;
            background-position: center center, left top;
            background-repeat: no-repeat, no-repeat;
        }

        .poster {
            background: url(../images/my_hero_academia.jpg) no-repeat center center;
            background-size: cover;
            flex-basis: 50%;
            border-radius: 20px;
        }

        @media only screen and (max-width: 480px) {
            body {
                background:
                    linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 70%, var(--color-bg1) 100%),
                    url(../images/my_hero_academia.jpg) center center no-repeat;
                background-size: cover;
            }
        }
    </style>
    <title>My Hero Academia</title>
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
                <img src="../images/logo.png" alt="Logo" class="logo">
                <img src="<?php echo $pfp; ?>" alt="Logo" width="75px" height="75px">
                <h2><?php echo $username ?></h2>
            </div>
            <ul>
                <li><a href="../home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="../profile.php"><i class="fa fa-user"></i>Profile</a></li>
                <li><a href="../profile_animeList.php"><i class="fa fa-list"></i>List</a></li>
                <li><a href="../browse.php"><i class="fa fa-ticket"></i>Reserve</a></li>
            </ul>
            <div class="menu-footer">
                <div class="buttons">
                    <button class="color-toggle original" data-scheme="original"></button>
                    <button class="color-toggle red" data-scheme="red"></button>
                    <button class="color-toggle green" data-scheme="green"></button>
                </div>
                <a href="../settings.php"><i class="fa fa-cog"></i>Settings</a>
                <a href="../index.php"><i class="fa fa-sign-out"></i>Logout</a>
            </div>
        </div>
    </div>

    <main>
        <div class="banner"></div>
        <div class="anime-description">
            <h1>My Hero Academia</h1>
            <div class="genre-wrapper">
                <p class="genre">Action, Adventure, Comedy</p>
            </div>
            <p>
                Middle school student Izuku Midoriya wants to be a hero more than anything, but he hasn't got an ounce of power in him.
                With no chance of ever getting into the prestigious U.A. High School for budding heroes, his life is looking more and more like a dead end.
                Then an encounter with All Might, the greatest hero of them all gives him a chance to change his destiny…
            </p>
            <div class="buttons">
                <button id="addToListBtn" class="button" onclick="displayModal()">Add to List <i class="fa fa-arrow-down"></i></button>
               
                <button id="watchTrailerBtn" class="button" type="button"
                    data-youtube="https://www.youtube.com/embed/EPVkcwyLQQ8?autoplay=1&fs=1">
                    Watch Trailer <i class="fa fa-play"></i>
                </button>
            </div>
        </div>

        <div id="addToListModal" class="modal">
            <div class="modal-content">
                <div class="poster"></div>
                <div class="setContent">
                    <span class="close">&times;</span>
                    <h2>Add to Your Anime List</h2>
                    <div class="form-wrapper">
                            <div class="label-wrapper">
                                <label for="status">Status:</label>
                                <label for="score">Score:</label>
                                <label for="episodes">Episodes:</label>
                            </div>
                            <div class="input-wrapper">
                                <select id="status" name="status" required>
                                    <option value="Watching">Watching</option>
                                    <option value="Completed">Completed</option>
                                    <option value="On-hold">On Hold</option>
                                    <option value="Dropped">Dropped</option>
                                    <option value="Plan-to-Watch">Plan to Watch</option>
                                </select>
                                <input type="number" id="score" name="score" min="1" max="10" placeholder="1-10" required>
                                <input type="number" id="episodes" name="episode" min="0" max="<?php echo htmlspecialchars($maxEpisodes); ?>" value="0" required>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="title" value="<?php echo htmlspecialchars($title); ?>">
                        <input type="hidden" name="genre" value="<?php echo htmlspecialchars($genre); ?>">
                        <input type="hidden" name="maxEpisodes" value="<?php echo htmlspecialchars($maxEpisodes); ?>">
                        <input type="hidden" name="year" value="<?php echo htmlspecialchars($year); ?>">
                        <input type="hidden" name="picture" value="<?php echo htmlspecialchars($picture); ?>">
                        <input type="hidden" name="format" value="<?php echo htmlspecialchars($format); ?>">
                        <input type="hidden" name="pathToReserve" value="<?php echo htmlspecialchars($pathToReserve); ?>">
                        <div class="save-wrapper">
                            <button type="submit">Save</button>
                        </div>
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