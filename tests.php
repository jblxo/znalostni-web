<?php include './templates/header.php'; ?>
<?php include './auth.php'; ?>
<?php
require_once './server/Database.php';
$tests = $database->getTests();
?>
<section class="tests">
    <h4>Tests</h4>
    <table>
        <tr>
            <th>Title</th>
            <th>Action</th>
        </tr>
            <?php
                while ($row = $tests->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>'.$row['title'].'</td>';
                    echo '<td><a href="/take_test.php?id='.$row['id'].'">Take test</a></td>';
                    echo '</tr>';
                }

                $tests->free();
            ?>
    </table>
</section>
<?php include './templates/footer.php'; ?>