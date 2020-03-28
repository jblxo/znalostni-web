<?php include './templates/header.php'; ?>
<?php include './auth.php'; ?>
<?php
    require_once './server/Database.php';

    $profile = $database->getProfile($_SESSION['idUser']);
    $results = $database->getUserResults($_SESSION['idUser']);
?>
<section class="profile">
    <h4>User Profile</h4>
    <h5>User info</h5>
    <ul>
        <?php
            while ($row = $profile->fetch_assoc()) {
                echo '<li>First name: '.$row['firstName'].'</li>';
                echo '<li>Last name: '.$row['lastName'].'</li>';
                echo '<li>Username: '.$row['username'].'</li>';
                echo '<li>Note: '.$row['note'].'</li>';
            }
        ?>
    </ul>
    <h5>Test results</h5>
    <table>
        <tr>
            <th>Test title</th>
            <th>Test result</th>
            <th>Completed at</th>
        </tr>
        <?php
            while ($row = $results->fetch_assoc()) {
                $testResult = intval($row['result']);
                if ($testResult < 80) {
                    echo '<tr class="bad">';
                } else {
                    echo '<tr class="good">';
                }
                echo '<td>'.$row['title'].'</td>';
                echo '<td>'.$row['result'].'%</td>';
                echo '<td>'.$row['completedAt'].'</td>';
                echo '</tr>';
            }
        ?>
    </table>
</section>
<?php include './templates/footer.php'; ?>