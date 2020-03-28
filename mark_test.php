<?php include './templates/header.php'; ?>
<?php include './auth.php'; ?>
<section class="mark-test">
<h4>Test results</h4>
<p>Wrong answers and results</p>
<?php

require_once './server/Database.php';

$correct = 0;
$wrong = 0;
$total = 0;

if (!empty($_POST['submit']) && !empty($_REQUEST['id'])) {
    $test = $database->getTestAnswers($_REQUEST['id']);

    while ($row = $test->fetch_assoc()) {
        if (intval($_POST['question'.$row['id']]) === intval($row['correctOptionIndex'])) {
            ++$correct;
        } else {
            ++$wrong;
            echo '<div>'.$row['title'].'</div>';
            echo '<div>Wrong answer: '.$row['option'.$_POST['question'.$row['id']]].'</div>';
            echo '<div>Correct answer: '.$row['option'.$row['correctOptionIndex']].'</div>';
            echo '<br>';
        }

        ++$total;
    }

    $rate = (100 * $correct) / $total;
    $database->insertTestResult($rate, $_SESSION['idUser'], $_REQUEST['id']);

    echo 'Success rate: '.(100 * $correct) / $total.'%<br>';
    echo 'Correct: '.$correct;
    echo '<br>';
    echo 'Wrong: '.$wrong;
}
?>
<br>
<a href="/leaderboard.php">Leaderboard</a>
</section>
<?php include './templates/footer.php'; ?>