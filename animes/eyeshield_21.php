<?php
session_start();

$username = $_SESSION['username'];
$pfp = isset($_SESSION['users'][$username]['profile']['pfp']) ? $_SESSION['users'][$username]['profile']['pfp'] : '../images/logo.png';

$title = 'Eyeshield 21';
$genre = 'Action, Comedy, Sports';
$year = '2005';
$picture = './images/eyeshield_21.png';
$format = 'tv';
$pathToReserve = './reserve/eyeshield_21-reserve.php';
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
                linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 95%, rgb(21, 1, 6) 100%),
                url(../images/eyeshield_21.png) left top no-repeat;
            background-size: cover, 50% 100%;
            background-position: center center, left top;
            background-repeat: no-repeat, no-repeat;
        }
    </style>
    <title>Eyeshield 21</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="../home.php" class="blue-text">Home</a></li>
            <li><a href="../profile_animeList.php" class="blue-text">List</a></li>
        </ul>
        <div class="avatar">
            <i class="fa fa-search"></i>
            <img src="<?php echo $pfp; ?>" alt="Logo" width="50px" height="50px" onclick="toggleAvatarHover()">
            <div id="avatarHover">
                <a href="../settings.php">Settings</a>
                <a href="../index.php">Logout</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="banner"></div>
        <div class="anime-description">
            <h1>Eyeshield 21</h1>
            <p class="genre">Action, Comedy, Sports</p>
            <p>
                Welcome To the Gridiron of the Damned! Huge hulking bodies throw themselves at each other, while a tiny lithe body runs between them for the goal! 
                No, it’s not a game of football, it’s Sena Kobayakawa trying to evade the monstrous Ha-Ha brothers down the halls of Deimon High School! 
                But wait! Sena’s incredible skills at not getting caught have been spotted by the devilish (possibly actually demonic) captain of the school’s embryonic American style football team, and when Sena asks to be the teams manager, he gets thrust onto the field as a running back instead! 
                But there are two BIG catches: first, to keep the identity of their new “star” player an absolute secret, Yoichi makes Sena wear an opaque visor on his helmet and gives him the alias of “Eyeshield 21.” 
                And the second catch? Well, in order to hit his fastest “speed of light” running mode, Sena usually has to be absolutely terrified. 
                Not that THAT will be a problem with the monstrous players that he’ll soon find himself running from! The insanity hits the streets when the feet meet the cleats in EYESHIELD 21! 
            </p>
            <button id="addToListBtn" class="button" onclick="displayModal()">Add to List <i class="fa fa-arrow-down"></i></button>
            <a href="#" class="button bookTickets">Book Tickets <i class="fa fa-arrow-right"></i></a>
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
                        <input type="hidden" name="title" value="<?php echo htmlspecialchars($title); ?>">
                        <input type="hidden" name="genre" value="<?php echo htmlspecialchars($genre); ?>">
                        <input type="hidden" name="year" value="<?php echo htmlspecialchars($year); ?>">
                        <input type="hidden" name="picture" value="<?php echo htmlspecialchars($picture); ?>">
                        <input type="hidden" name="format" value="<?php echo htmlspecialchars($format); ?>">
                        <input type="hidden" name="pathToReserve" value="<?php echo htmlspecialchars($pathToReserve); ?>">
                        <button type="submit">Save</button>
                        <p>
                            Welcome To the Gridiron of the Damned! Huge hulking bodies throw themselves at each other, while a tiny lithe body runs between them for the goal! 
                            No, it’s not a game of football, it’s Sena Kobayakawa trying to evade the monstrous Ha-Ha brothers down the halls of Deimon High School! 
                            But wait! Sena’s incredible skills at not getting caught have been spotted by the devilish (possibly actually demonic) captain of the school’s embryonic American style football team, and when Sena asks to be the teams manager, he gets thrust onto the field as a running back instead! 
                        </p>
                    </form>
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