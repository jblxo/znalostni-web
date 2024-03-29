<?php include './templates/header.php'; ?>
<?php
    require_once './server/Database.php';

    if (isset($_SESSION['idUser'])) {
        header('Location: https://quiz-web-maturita.herokuapp.com/');
    }

    if (!empty($_POST['submit'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $user = $database->signIn($email, $password);
        if (isset($user)) {
            $_SESSION['idUser'] = $user->id;
            header('Location: https://quiz-web-maturita.herokuapp.com/');
        }
    }
?>
<section class="signup">
    <h4 class="signup-heading">Sign In</h4>
    <form class="signup-form" action="signin.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <input class="submit-btn" type="submit" name="submit" value="submit">
    </form>
</section>
<?php include './templates/footer.php'; ?>