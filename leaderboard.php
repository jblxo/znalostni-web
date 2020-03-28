<?php include './templates/header.php'; ?>
<?php include './auth.php'; ?>
<?php
    require_once './server/Database.php';

    $leaderboard = $database->getLeaderboard();
    $place = 1;
?>
<section class="leaderboard">
    <h4>Leaderboard</h4>
    <p>Top 5 users</p>
    <table>
        <tr>
            <th>Place</th>
            <th>User</th>
            <th>Tests taken</th>
            <th>Average score</th>
        </tr>
        <?php
            while ($row = $leaderboard->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$place.'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['testsTaken'].'</td>';
                echo '<td>'.$row['averageScore'].'</td>';
                echo '</tr>';

                ++$place;
            }
        ?>
    </table>
</section>
<?php include './templates/footer.php'; ?>