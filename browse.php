<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/browse.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Browse</title>
</head>
<body>
    <nav class="top-nav">
        <a href="profile.php"><img src="images/logo.svg" alt="Logo" width="50px" height="50px"></a>
        <ul>
            <li><a href="profile.php">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Anime List</a></li>
            <li><a href="#">Manga List</a></li>
            <li><a href="browse.php">Browse</a></li>
        </ul>
        <div class="avatar">
            <i class="fa fa-search"></i>
            <img src="images/logo.svg" alt="Logo" width="50px" height="50px">
            <p><i class="fa fa-arrow-down"></i></p>
        </div>
    </nav>

    <main>
        <div class="filter-anime">
            <div class="filter">
                <h3>Search</h3>
                <div class="search-anime">
                    <input type="text" placeholder="Search for anime...">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="filter">
                <h3>Genres</h3>
                <select name="genre" id="genre">
                    <option value="any">Any</option>
                    <option value="action">Action</option>
                    <option value="adventure">Adventure</option>
                    <option value="comedy">Comedy</option>
                    <option value="drama">Drama</option>
                    <option value="fantasy">Fantasy</option>
                    <option value="horror">Horror</option>
                    <option value="romance">Romance</option>
                    <option value="sci-fi">Sci-Fi</option>
                </select>
            </div>
            <div class="filter">
                <h3>Year</h3>
                <select name="year" id="year">
                    <option value="any">Any</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                </select>
            </div>
            <div class="filter">
                <h3>Season</h3>
                <select name="season" id="season">
                    <option value="any">Any</option>
                    <option value="winter">Winter</option>
                    <option value="spring">Spring</option>
                    <option value="summer">Summer</option>
                    <option value="fall">Fall</option>
                </select>
            </div>
            <div class="filter">
                <h3>Format</h3>
                <select name="format" id="format">
                    <option value="any">Any</option>
                    <option value="tv">TV Show</option>
                    <option value="movie">Movie</option>
                </select>
            </div>
        </div>

        <div class="trending-anime">
            <h2>TRENDING ANIME</h2>
            <div class="animes">
                <div class="anime-card">
                    <a href="./animes/one_piece.php"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
            </div>
        </div>

        <div class="popular-anime">
            <h2>POPULAR NOW</h2>
            <div class="animes">
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
            </div>
        </div>

        <div class="alltime-anime">
            <h2>ALL TIME POPULAR</h2>
            <div class="animes">
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
                <div class="anime-card">
                    <a href="#"><img src="images/one-piece.jpg" alt="Poster"></a>
                    <a href="#">Title</a>
                </div>
            </div>
        </div>

        <div class="top-anime">
            <div class="top">
                <h2>TOP ANIME</h2>
                <a href="#">View All</a>
            </div>
            <div class="list">
                <div class="listed-anime">
                    <div class="number-wrapper">
                        <h3>#1</h3>
                    </div>
                    <div class="anime-info">
                        <img src="images/one-piece.jpg" alt="">
                        <div class="content">
                            <div class="title">
                                <h4>Title</h4>
                                <a href="#">genre</a>
                            </div>
                            <div class="score">
                                <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                                <div class="users">
                                    <h3>100%</h3>
                                    <p>100 users</p>
                                </div>
                            </div>
                            <div class="format">
                                <h3>TV Show</h3>
                                <p>24 episodes</p>
                            </div>
                            <div class="season">
                                <h3>Winter 2023</h3>
                                <p>Finished</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listed-anime">
                    <div class="number-wrapper">
                        <h3>#2</h3>
                    </div>
                    <div class="anime-info">
                        <img src="images/one-piece.jpg" alt="">
                        <div class="content">
                            <div class="title">
                                <h4>Title</h4>
                                <a href="#">genre</a>
                            </div>
                            <div class="score">
                                <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                                <div class="users">
                                    <h3>100%</h3>
                                    <p>100 users</p>
                                </div>
                            </div>
                            <div class="format">
                                <h3>TV Show</h3>
                                <p>24 episodes</p>
                            </div>
                            <div class="season">
                                <h3>Winter 2023</h3>
                                <p>Finished</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listed-anime">
                    <div class="number-wrapper">
                        <h3>#3</h3>
                    </div>
                    <div class="anime-info">
                        <img src="images/one-piece.jpg" alt="">
                        <div class="content">
                            <div class="title">
                                <h4>Title</h4>
                                <a href="#">genre</a>
                            </div>
                            <div class="score">
                                <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                                <div class="users">
                                    <h3>100%</h3>
                                    <p>100 users</p>
                                </div>
                            </div>
                            <div class="format">
                                <h3>TV Show</h3>
                                <p>24 episodes</p>
                            </div>
                            <div class="season">
                                <h3>Winter 2023</h3>
                                <p>Finished</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listed-anime">
                    <div class="number-wrapper">
                        <h3>#4</h3>
                    </div>
                    <div class="anime-info">
                        <img src="images/one-piece.jpg" alt="">
                        <div class="content">
                            <div class="title">
                                <h4>Title</h4>
                                <a href="#">genre</a>
                            </div>
                            <div class="score">
                                <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                                <div class="users">
                                    <h3>100%</h3>
                                    <p>100 users</p>
                                </div>
                            </div>
                            <div class="format">
                                <h3>TV Show</h3>
                                <p>24 episodes</p>
                            </div>
                            <div class="season">
                                <h3>Winter 2023</h3>
                                <p>Finished</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listed-anime">
                    <div class="number-wrapper">
                        <h3>#5</h3>
                    </div>
                    <div class="anime-info">
                        <img src="images/one-piece.jpg" alt="">
                        <div class="content">
                            <div class="title">
                                <h4>Title</h4>
                                <a href="#">genre</a>
                            </div>
                            <div class="score">
                                <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                                <div class="users">
                                    <h3>100%</h3>
                                    <p>100 users</p>
                                </div>
                            </div>
                            <div class="format">
                                <h3>TV Show</h3>
                                <p>24 episodes</p>
                            </div>
                            <div class="season">
                                <h3>Winter 2023</h3>
                                <p>Finished</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listed-anime">
                    <div class="number-wrapper">
                        <h3>#6</h3>
                    </div>
                    <div class="anime-info">
                        <img src="images/one-piece.jpg" alt="">
                        <div class="content">
                            <div class="title">
                                <h4>Title</h4>
                                <a href="#">genre</a>
                            </div>
                            <div class="score">
                                <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                                <div class="users">
                                    <h3>100%</h3>
                                    <p>100 users</p>
                                </div>
                            </div>
                            <div class="format">
                                <h3>TV Show</h3>
                                <p>24 episodes</p>
                            </div>
                            <div class="season">
                                <h3>Winter 2023</h3>
                                <p>Finished</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listed-anime">
                    <div class="number-wrapper">
                        <h3>#7</h3>
                    </div>
                    <div class="anime-info">
                        <img src="images/one-piece.jpg" alt="">
                        <div class="content">
                            <div class="title">
                                <h4>Title</h4>
                                <a href="#">genre</a>
                            </div>
                            <div class="score">
                                <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                                <div class="users">
                                    <h3>100%</h3>
                                    <p>100 users</p>
                                </div>
                            </div>
                            <div class="format">
                                <h3>TV Show</h3>
                                <p>24 episodes</p>
                            </div>
                            <div class="season">
                                <h3>Winter 2023</h3>
                                <p>Finished</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listed-anime">
                    <div class="number-wrapper">
                        <h3>#8</h3>
                    </div>
                    <div class="anime-info">
                        <img src="images/one-piece.jpg" alt="">
                        <div class="content">
                            <div class="title">
                                <h4>Title</h4>
                                <a href="#">genre</a>
                            </div>
                            <div class="score">
                                <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                                <div class="users">
                                    <h3>100%</h3>
                                    <p>100 users</p>
                                </div>
                            </div>
                            <div class="format">
                                <h3>TV Show</h3>
                                <p>24 episodes</p>
                            </div>
                            <div class="season">
                                <h3>Winter 2023</h3>
                                <p>Finished</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listed-anime">
                    <div class="number-wrapper">
                        <h3>#9</h3>
                    </div>
                    <div class="anime-info">
                        <img src="images/one-piece.jpg" alt="">
                        <div class="content">
                            <div class="title">
                                <h4>Title</h4>
                                <a href="#">genre</a>
                            </div>
                            <div class="score">
                                <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                                <div class="users">
                                    <h3>100%</h3>
                                    <p>100 users</p>
                                </div>
                            </div>
                            <div class="format">
                                <h3>TV Show</h3>
                                <p>24 episodes</p>
                            </div>
                            <div class="season">
                                <h3>Winter 2023</h3>
                                <p>Finished</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listed-anime">
                    <div class="number-wrapper">
                        <h3>#10</h3>
                    </div>
                    <div class="anime-info">
                        <img src="images/one-piece.jpg" alt="">
                        <div class="content">
                            <div class="title">
                                <h4>Title</h4>
                                <a href="#">genre</a>
                            </div>
                            <div class="score">
                                <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
                                <div class="users">
                                    <h3>100%</h3>
                                    <p>100 users</p>
                                </div>
                            </div>
                            <div class="format">
                                <h3>TV Show</h3>
                                <p>24 episodes</p>
                            </div>
                            <div class="season">
                                <h3>Winter 2023</h3>
                                <p>Finished</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <h1>Footer</h1>
    </footer>
</body>
</html>