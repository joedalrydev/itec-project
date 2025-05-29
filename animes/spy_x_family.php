<?php
session_start();

$username = $_SESSION['username'];
$pfp = isset($_SESSION['users'][$username]['profile']['pfp']) ? $_SESSION['users'][$username]['profile']['pfp'] : '../images/logo.png';

$title = 'SPY x FAMILY';
$genre = 'Action, Comedy, Slice of Life, Supernatural';
$year = '2022';
$picture = './images/spy_x_family.jpg';
$format = 'tv';
$pathToReserve = './reserve/spy_x_family-reserve.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/anime.css">
    <title>SPY x FAMILY</title>
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
            <h1>SPY x FAMILY</h1>
            <p class="genre">Action, Comedy, Slice of Life, Supernatural</p>
            <p>
                Everyone has a part of themselves they cannot show to anyone else.

                At a time when all nations of the world were involved in a fierce war of information happening behind closed doors, Ostania and Westalis had been in a state of cold war against one another for decades. 
                The Westalis Intelligence Services' Eastern-Focused Division (WISE) sends their most talented spy, "Twilight," on a top-secret mission to investigate the movements of Donovan Desmond, the chairman of Ostania's National Unity Party, who is threatening peace efforts between the two nations.

                This mission is known as "Operation Strix." It consists of "putting together a family in one week in order to infiltrate social gatherings organized by the elite school that Desmond's son attends."

                "Twilight" takes on the identity of psychiatrist Loid Forger and starts looking for family members. 
                But Anya, the daughter he adopts, turns out to have the ability to read people's minds, while his wife, Yor, is an assassin! 
                With it being in each of their own interests to keep these facts hidden, they start living together while concealing their true identities from one another.
                World peace is now in the hands of this brand-new family as they embark on an adventure full of surprises. 
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
                            Everyone has a part of themselves they cannot show to anyone else.
                            At a time when all nations of the world were involved in a fierce war of information happening behind closed doors, Ostania and Westalis had been in a state of cold war against one another for decades. 
                            The Westalis Intelligence Services' Eastern-Focused Division (WISE) sends their most talented spy, "Twilight," on a top-secret mission to investigate the movements of Donovan Desmond, the chairman of Ostania's National Unity Party, who is threatening peace efforts between the two nations.
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