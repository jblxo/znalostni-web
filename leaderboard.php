<?php include './templates/header.php'; ?>
<?php include './auth.php'; ?>
<?php
    require_once './server/Database.php';
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
    </table>
</section>
<?php include './templates/footer.php'; ?>