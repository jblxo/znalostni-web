<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/signup.css">
    <link rel="stylesheet" href="../styles/tests.css">
    <link rel="stylesheet" href="../styles/take_test.css">
    <title>Quiz Web</title>
</head>
<body>
    <header>
        <nav class="menu">
            <ul class="menu-list">
                <li class="menu-link">
                    <a href="/">Home</a>
                </li>
                <?php
                if (!isset($_SESSION['idUser'])) {
                    echo '<li class="menu-link">
                    <a href="/signup.php">Sign Up</a>
                    </li>
                    <li class="menu-link">
                    <a href="/signin.php">Sign In</a>
                    </li>';
                }
                ?>
                <?php
                if (isset($_SESSION['idUser'])) {
                    echo '<li class="menu-link">
                    <a href="/tests.php">Tests</a>
                </li>
                <li class="menu-link">
                    <a href="#">Leaderboard</a>
                </li>
                <li class="menu-link">
                    <a href="/signout.php">Sign out</a>
                </li>
                ';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
