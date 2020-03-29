<?php

if (!isset($_SESSION['idUser'])) {
    header('Location: https://quiz-web-maturita.herokuapp.com/nopermission.php');
}
