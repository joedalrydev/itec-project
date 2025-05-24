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
    <link rel="stylesheet" href="../styles/reserve.css">
    <title>One Piece</title>
</head>

<body>


    <main>
        <div class="top">
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
            <div class="anime">
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
                    <a href="#book" class="button bookTickets">Book Tickets <i class="fa fa-arrow-down"></i></a>
                </div>
            </div>
        </div>

        <div id="book">
            <div class="info">
                <p>Price: <span class="gradient-text">₱250</span></p>
                <p>Runtime: <span class="gradient-text">2hrs</span></p>
                <p>Rating: <span class="gradient-text">SPG</span></p>
            </div>
            <div class="select-options">
                <div class="option">
                    <p>Select Location:</p>
                    <select name="location" id="location">
                        <option value="????">????</option>
                    </select>
                </div>
                <div class="option">
                    <p>Select Date:</p>
                    <select name="date" id="date">
                        <option value="????">????</option>
                    </select>
                </div>
            </div>

            <div class="select-main">
                <h2>Select your seat</h2>
                <div class="select-seat">
                    <div class="legend">
                        <div class="legend-wrapper">
                            <div class="user-seat legend-seat"></div>
                            <p>Your seat</p>
                        </div>
                        <div class="legend-wrapper">
                            <div class="available-seat legend-seat"></div>
                            <p>Available seat</p>
                        </div>
                        <div class="legend-wrapper">
                            <div class="sold legend-seat"></div>
                            <p>Sold</p>
                        </div>
                    </div>
                    <h2 id="screen">Screen</h2>
                    <div class="seats-container">
                        <div class="rows">
                            <p>A</p>
                            <p>B</p>
                            <p>C</p>
                            <p>D</p>
                            <p>E</p>
                        </div>
                        <div class="left-side">
                            <div class="available-seat">16</div>
                            <div class="available-seat">15</div>
                            <div class="available-seat">14</div>
                            <div class="available-seat">13</div>
                            <div class="available-seat">16</div>
                            <div class="available-seat">15</div>
                            <div class="available-seat">14</div>
                            <div class="available-seat">13</div>
                            <div class="available-seat">16</div>
                            <div class="available-seat">15</div>
                            <div class="available-seat">14</div>
                            <div class="available-seat">13</div>
                            <div class="available-seat">16</div>
                            <div class="available-seat">15</div>
                            <div class="available-seat">14</div>
                            <div class="available-seat">13</div>
                            <div class="available-seat">16</div>
                            <div class="available-seat">15</div>
                            <div class="available-seat">14</div>
                            <div class="available-seat">13</div>
                        </div>

                        <div class="middle-section">
                            <div class="available-seat">12</div>
                            <div class="available-seat">11</div>
                            <div class="available-seat">10</div>
                            <div class="available-seat">9</div>
                            <div class="available-seat">8</div>
                            <div class="available-seat">7</div>
                            <div class="available-seat">6</div>
                            <div class="available-seat">5</div>
                            <div class="available-seat">12</div>
                            <div class="available-seat">11</div>
                            <div class="available-seat">10</div>
                            <div class="available-seat">9</div>
                            <div class="available-seat">8</div>
                            <div class="available-seat">7</div>
                            <div class="available-seat">6</div>
                            <div class="available-seat">5</div>
                            <div class="available-seat">12</div>
                            <div class="available-seat">11</div>
                            <div class="available-seat">10</div>
                            <div class="available-seat">9</div>
                            <div class="available-seat">8</div>
                            <div class="available-seat">7</div>
                            <div class="available-seat">6</div>
                            <div class="available-seat">5</div>
                            <div class="available-seat">12</div>
                            <div class="available-seat">11</div>
                            <div class="available-seat">10</div>
                            <div class="available-seat">9</div>
                            <div class="available-seat">8</div>
                            <div class="available-seat">7</div>
                            <div class="available-seat">6</div>
                            <div class="available-seat">5</div>
                            <div class="available-seat">12</div>
                            <div class="available-seat">11</div>
                            <div class="available-seat">10</div>
                            <div class="available-seat">9</div>
                            <div class="available-seat">8</div>
                            <div class="available-seat">7</div>
                            <div class="available-seat">6</div>
                            <div class="available-seat">5</div>
                        </div>

                        <div class="right-side">
                            <div class="available-seat">4</div>
                            <div class="available-seat">3</div>
                            <div class="available-seat">2</div>
                            <div class="available-seat">1</div>
                            <div class="available-seat">4</div>
                            <div class="available-seat">3</div>
                            <div class="available-seat">2</div>
                            <div class="available-seat">1</div>
                            <div class="available-seat">4</div>
                            <div class="available-seat">3</div>
                            <div class="available-seat">2</div>
                            <div class="available-seat">1</div>
                            <div class="available-seat">4</div>
                            <div class="available-seat">3</div>
                            <div class="available-seat">2</div>
                            <div class="available-seat">1</div>
                            <div class="available-seat">4</div>
                            <div class="available-seat">3</div>
                            <div class="available-seat">2</div>
                            <div class="available-seat">1</div>
                        </div>
                        <div class="rows">
                            <p>A</p>
                            <p>B</p>
                            <p>C</p>
                            <p>D</p>
                            <p>E</p>
                        </div>
                    </div>

                    <div class="save-button">
                        <button type="submit">Save it</button>
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

</html>