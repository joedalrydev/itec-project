<?php
session_start();

$username = $_SESSION['username'];
$pfp = isset($_SESSION['users'][$username]['profile']['pfp']) ? $_SESSION['users'][$username]['profile']['pfp'] : '../images/logo.png';

$title = 'Attack on Titan';
$genre = 'Action, Drama, Fantasy, Mystery';
$year = '2013';
$picture = './images/attack_on_titan.jpg';
$format = 'tv';
$pathToReserve = './reserve/attack_on_titan-reserve.php';
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
                url(../images/attack_on_titan.jpg) left top no-repeat;
            background-size: cover, 50% 100%;
            background-position: center center, left top;
            background-repeat: no-repeat, no-repeat;
        }
    </style>
    <title>Attack on Titan</title>
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
            <h1>Attack on Titan</h1>
            <p class="genre">Action, Drama, Fantasy, Mystery</p>
            <p>
                Several hundred years ago, humans were nearly exterminated by titans. 
                Titans are typically several stories tall, seem to have no intelligence, devour human beings and, worst of all, seem to do it for the pleasure rather than as a food source. 
                A small percentage of humanity survived by walling themselves in a city protected by extremely high walls, even taller than the biggest of titans.

                Flash forward to the present and the city has not seen a titan in over 100 years. 
                Teenage boy Eren and his foster sister Mikasa witness something horrific as the city walls are destroyed by a colossal titan that appears out of thin air. 
                As the smaller titans flood the city, the two kids watch in horror as their mother is eaten alive. 
                Eren vows that he will murder every single titan and take revenge for all of mankind.
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
                            Several hundred years ago, humans were nearly exterminated by titans. 
                            Titans are typically several stories tall, seem to have no intelligence, devour human beings and, worst of all, seem to do it for the pleasure rather than as a food source. 
                            A small percentage of humanity survived by walling themselves in a city protected by extremely high walls, even taller than the biggest of titans.
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