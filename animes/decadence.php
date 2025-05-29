<?php
session_start();

$username = $_SESSION['username'];
$pfp = isset($_SESSION['users'][$username]['profile']['pfp']) ? $_SESSION['users'][$username]['profile']['pfp'] : '../images/logo.png';

$title = 'DECA-DENCE';
$genre = 'Action, Adventure, Sci-Fi';
$year = '2020';
$picture = './images/decadence.png';
$format = 'tv';
$pathToReserve = './reserve/decadence-reserve.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/anime.css">
    <title>DECA-DENCE</title>
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
                <a href="settings.php">Settings</a>
                <a href="index.php">Logout</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="banner"></div>
        <div class="anime-description">
            <h1>DECA-DENCE</h1>
            <p class="genre">Action, Adventure, Sci-Fi</p>
            <p>
                Many years have passed since humanity was driven to the brink of extinction by the sudden emergence of the unknown life forms Gadoll. 
                Those humans that survived now dwell in a 3000 meter-high mobile fortress Deca-dence built to protect themselves from the Gadoll threat.

                Denizens of Deca-dence fall into two categories: Gears, warriors who fight the Gadoll daily, and Tankers, those without the skills to fight. 
                One day, Natsume, a Tanker girl who dreams of becoming a Gear meets surly Kaburagi, an armor repairman of Deca-dence.

                This chance meeting between the seemingly two opposites, the girl with a positive attitude who never gives up on her dreams and the realist who has given up on his, will eventually shake the future course of this world. 
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
                    <form id="addToListForm" action="one_piece.php" method="POST">
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
                        <button type="submit">Save</button>
                        <p>
                            Many years have passed since humanity was driven to the brink of extinction by the sudden emergence of the unknown life forms Gadoll. 
                            Those humans that survived now dwell in a 3000 meter-high mobile fortress Deca-dence built to protect themselves from the Gadoll threat.
                        </p>
                    </form>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $status = $_POST['status'];
                        $score = $_POST['score'];

                        if (!isset($_SESSION['users'][$username]['profile']['anime_list'])) {
                            $_SESSION['users'][$username]['profile']['anime_list'] = [];
                        }

                        foreach ($_SESSION['users'][$username]['profile']['anime_list'] as $anime) {
                            if ($anime['title'] === $title){
                                echo "<script>alert('This anime is already in your list.')</script>";
                                exit;
                            }
                        }
                        $_SESSION['users'][$username]['profile']['anime_list'][] = [
                            'title' => $title,
                            'genre' => $genre,
                            'year' => $year,
                            'status' => $status,
                            'score' => $score,
                            'picture' => $picture,
                            'format' => $format,
                            'pathToReserve' => $pathToReserve
                        ];
                        echo "<script>alert('Anime added to your list!')</script>";
                    }
                    ?>
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