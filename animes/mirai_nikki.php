<?php
session_start();

$username = $_SESSION['username'];
$pfp = isset($_SESSION['users'][$username]['profile']['pfp']) ? $_SESSION['users'][$username]['profile']['pfp'] : '../images/logo.png';

$title = 'Mirai Nikki';
$genre = 'Action, Horror, Mystery, Psychological, Supernatural, Thriller';
$year = '2011';
$picture = './images/mirai_nikki.png';
$format = 'tv';
$pathToReserve = './reserve/mirai_nikki-reserve.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/anime.css">
    <title>Mirai Nikki</title>
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
            <h1>Mirai Nikki</h1>
            <p class="genre">Action, Horror, Mystery, Psychological, Supernatural, Thriller</p>
            <p>
                This psychological thriller, based on the manga written and illustrated by Sakae Esuno, is about Yuki, a loner who's not very good with people. 
                He prefers to write a diary on his cell phone and talk to his imaginary friend, Deus Ex Machina – The God of Time and Space. 
                However, Yuki soon learns that Deus is more than a figment of his imagination when he makes Yuki participate in a battle royale with eleven others. 
                The contestants are given special diaries that can predict the future, each diary possessing unique features that give it both advantages and disadvantages. 
                Within the next 90 days, the contestants must try to survive until there is only one left standing. 
                The winner will become the new God of Time and Space.
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
                            This psychological thriller, is about Yuki, a loner who's not very good with people. 
                            He prefers to write a diary on his cell phone and talk to his imaginary friend, Deus Ex Machina – The God of Time and Space. 
                            However, Yuki soon learns that Deus is more than a figment of his imagination when he makes Yuki participate in a battle royale with eleven others. 
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