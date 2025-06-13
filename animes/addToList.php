<?php
session_start();
include("../database.php");

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $score = $_POST['score'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $episodes = $_POST['episode'];
    $maxEpisodes = $_POST['maxEpisodes'];
    $year = $_POST['year'];
    $picture = $_POST['picture'];
    $format = $_POST['format'];
    $pathToReserve = $_POST['pathToReserve'];

    //tinitingnan kung yung anime ay nasa list na ng user
    $sql = $conn->prepare("SELECT id FROM anime_list WHERE username = ? AND title = ?");
    $sql->bind_param("ss", $username, $title);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows > 0) {
        echo "<script>alert('This anime is already in your list.')</script>";
        echo "<script>window.location.href = '../home.php';</script>";
        exit;
    }

    //nilalagay yung anime sa database
    $sql = $conn->prepare("INSERT INTO anime_list (username, title, genre, episodes, max_episodes, year, status, score, picture, format, path_to_reserve) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("sssssssssss", $username, $title, $genre, $episodes, $maxEpisodes, $year, $status, $score, $picture, $format, $pathToReserve);
    $sql->execute();
    
    echo "<script>alert('Anime added to your list!')</script>";
    echo "<script>window.location.href = '../home.php';</script>";
}
?>