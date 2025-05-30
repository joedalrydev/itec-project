<?php
session_start();

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $score = $_POST['score'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $picture = $_POST['picture'];
    $format = $_POST['format'];
    $pathToReserve = $_POST['pathToReserve'];

    if (!isset($_SESSION['users'][$username]['profile']['anime_list'])) {
        $_SESSION['users'][$username]['profile']['anime_list'] = [];
    }

    foreach ($_SESSION['users'][$username]['profile']['anime_list'] as $anime) {
        if ($anime['title'] === $title) {
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
    echo "<script>window.location.href = '../home.php';</script>";
}
?>