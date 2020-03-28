<?php include './templates/header.php'; ?>
<?php include './auth.php'; ?>

<?php

    require_once './server/Database.php';

    $correct = 0;
    $wrong = 0;

    if (!empty($_POST['submit']) && !empty($_REQUEST['id'])) {
        $test = $database->getTestAnswers($_REQUEST['id']);

        while ($row = $test->fetch_assoc()) {
            if (intval($_POST['question'.$row['id']]) === intval($row['correctOptionIndex'])) {
                ++$correct;
            } else {
                ++$wrong;
            }
        }

        echo 'Correct: '.$correct;
        echo '<br>';
        echo 'Wrong: '.$wrong;
    }
?>
<?php include './templates/footer.php'; ?>