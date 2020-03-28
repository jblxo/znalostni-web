<?php include './templates/header.php'; ?>
<?php include './auth.php'; ?>
<?php
    require_once './server/Database.php';

    if (!empty($_REQUEST['id'])) {
        $test = $database->getTest($_REQUEST['id']);
    }
?>
<section class="take-test">
    <h4>Take test</h4>
    <?php echo '<form action="mark_test.php?id='.$_REQUEST['id'].'" method="post">'; ?>
        <?php
            while ($row = $test->fetch_assoc()) {
                echo '<div class="question">';
                echo '<div>'.$row['title'].'</div>';
                echo '<div>';
                echo $row['option1'].' <input type="radio" name="question'.$row['id'].'" value="1" required>';
                echo $row['option2'].' <input type="radio" name="question'.$row['id'].'" value="2" required>';
                echo $row['option3'].' <input type="radio" name="question'.$row['id'].'" value="3" required>';
                echo '</div>';
                echo '</div>';
            }

            $test->free();
        ?>
        <input type="submit" value="submit" name="submit">
    </form>
</section>
<?php include './templates/footer.php'; ?>