<<<<<<< HEAD
<?php
session_start();

$username = $_SESSION['username'];
$pfp = isset($_SESSION['users'][$username]['profile']['pfp']) ? $_SESSION['users'][$username]['profile']['pfp'] : '../images/logo.png';

$title = 'One Piece';
$genre = 'Action';
$year = '1999';
$picture = './images/one-piece.jpg';
$format = 'tv';
$pathToReserve = './reserve/one-piece-reserve.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/anime.css">
    <title>One Piece</title>
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
            <h1>One Piece</h1>
            <p class="genre">Action</p>
            <p>
                Gold Roger was known as the Pirate King, the strongest and most infamous being to have sailed the Grand Line.
                The capture and death of Roger by the World Government brought a change throughout the world.
                His last words before his death revealed the location of the greatest treasure in the world, One Piece.
                It was this revelation that brought about the Grand Age of Pirates,
                men who dreamed of finding One Piece (which promises an unlimited amount of riches and fame),
                and quite possibly the most coveted of titles for the person who found it, the title of the Pirate King.
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
                            Gold Roger was known as the Pirate King, the strongest and most infamous being to have sailed the Grand Line.
                            The capture and death of Roger by the World Government brought a change throughout the world.
                            His last words before his death revealed the location of the greatest treasure in the world, One Piece.
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

=======
<?php
session_start();

$username = $_SESSION['username'];

$title = 'One Piece';
$genre = 'action';
$year = '1999';
$season = 'fall';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/anime.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>One Piece</title>
</head>

<body>
    <nav class="top-nav">
        <a href="profile.php"><img src="../images/logo.svg" alt="Logo" width="50px" height="50px"></a>
        <ul>
            <li><a href="/itec-project/profile.php">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Anime List</a></li>
            <li><a href="#">Manga List</a></li>
            <li><a href="/itec-project/browse.php">Browse</a></li>
        </ul>
        <div class="avatar">
            <i class="fa fa-search"></i>
            <img src="../images/logo.svg" alt="Logo" width="50px" height="50px">
            <p><i class="fa fa-arrow-down"></i></p>
        </div>
    </nav>

    <main>
        <div class="banner"></div>
        <div class="anime-description">
            <div class="poster">
                <img src="../images/one-piece.jpg" alt="poster" width="225px" height="350px">
                <button id="addToListBtn" onclick="displayModal()">Add to List</button>
            </div>
            <div class="description">
                <h1>One Piece</h1>
                <p>
                    Gold Roger was known as the Pirate King, the strongest and most infamous being to have sailed the Grand Line.
                    The capture and death of Roger by the World Government brought a change throughout the world.
                    His last words before his death revealed the location of the greatest treasure in the world, One Piece.
                    It was this revelation that brought about the Grand Age of Pirates,
                    men who dreamed of finding One Piece (which promises an unlimited amount of riches and fame),
                    and quite possibly the most coveted of titles for the person who found it, the title of the Pirate King.
                </p>
            </div>
        </div>

        <div id="addToListModal" class="modal">
            <div class="modal-content">
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
                    <button type="submit">Add</button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $status = $_POST['status'];
                    $score = $_POST['score'];

                    if (!isset($_SESSION['users'][$username]['profile']['anime_list'])) {
                        $_SESSION['users'][$username]['profile']['anime_list'] = [];
                    }

                    $_SESSION['users'][$username]['profile']['anime_list'][] = [
                        'title' => $title,
                        'genre' => $genre,
                        'year' => $year,
                        'season' => $season,
                        'status' => $status,
                        'score' => $score,
                    ];

                }
                ?>
            </div>
        </div>


        <div class="details">
            <div class="side-details">

            </div>
            <div class="main-details">
                <h3>Characters</h3>
                <div class="characters">
                    <div class="character-wrapper">
                        <div class="character">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Luffy</p>
                                <p>Main</p>
                            </div>
                        </div>
                        <div class="va">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Mayumi Tanaka</p>
                                <p>Japanese</p>
                            </div>
                        </div>
                    </div>
                    <div class="character-wrapper">
                        <div class="character">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Luffy</p>
                                <p>Main</p>
                            </div>
                        </div>
                        <div class="va">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Mayumi Tanaka</p>
                                <p>Japanese</p>
                            </div>
                        </div>
                    </div>
                    <div class="character-wrapper">
                        <div class="character">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Luffy</p>
                                <p>Main</p>
                            </div>
                        </div>
                        <div class="va">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Mayumi Tanaka</p>
                                <p>Japanese</p>
                            </div>
                        </div>
                    </div>
                    <div class="character-wrapper">
                        <div class="character">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Luffy</p>
                                <p>Main</p>
                            </div>
                        </div>
                        <div class="va">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Mayumi Tanaka</p>
                                <p>Japanese</p>
                            </div>
                        </div>
                    </div>
                    <div class="character-wrapper">
                        <div class="character">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Luffy</p>
                                <p>Main</p>
                            </div>
                        </div>
                        <div class="va">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Mayumi Tanaka</p>
                                <p>Japanese</p>
                            </div>
                        </div>
                    </div>
                    <div class="character-wrapper">
                        <div class="character">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Luffy</p>
                                <p>Main</p>
                            </div>
                        </div>
                        <div class="va">
                            <img src="../images/one-piece.jpg" alt="Luffy" width="65px" height="90px">
                            <div class="name">
                                <p>Mayumi Tanaka</p>
                                <p>Japanese</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

     <script>
        const animeList = <?php echo json_encode($animeList); ?>;
    </script>
    <script src="../scripts/script.js"></script>
</body>

>>>>>>> 41f726397fd0129db99b02b14066303beaac1e93
</html>