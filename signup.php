<?php include './templates/header.php'; ?>
<?php
    require_once './server/Database.php';

    if (isset($_SESSION['idUser'])) {
        header('Location: http://localhost/');
    }

    $error = '';

    if (!empty($_POST['submit'])) {
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $passwordCheck = htmlspecialchars($_POST['passwordCheck']);
        $email = htmlspecialchars($_POST['email']);
        $note = htmlspecialchars($_POST['note']);

        if ($password !== $passwordCheck) {
            $error = 'Passwords do not match!';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user = $database->signUp($firstName, $lastName, $username, $hash, $email, $note);
            $_SESSION['idUser'] = $user->id;
        }
    }
?>
<section class="signup">
    <h4 class="signup-heading">Sign Up</h4>
    <form class="signup-form" action="signup.php" method="post">
        <span class="signup-error"><?php if ('' !== $error) {
    echo $error;
} ?></span>
        <label for="firstName">First name</label>
        <input type="text" name="firstName" value="test" required>
        <label for="lastName">Last name</label>
        <input type="text" name="lastName" value="user" required>
        <label for="username">Username</label>
        <input type="text" name="username" value="username" required>
        <label for="password">Password</label>
        <input type="password" name="password" value="test" required>
        <label for="passwordCheck">Password Check</label>
        <input type="password" name="passwordCheck" value="test" required>
        <label for="email">Email</label>
        <input type="email" name="email" value="test.user@address.com" required>
        <label for="note">Note</label>
        <textarea name="note" id="note" cols="30" rows="10"></textarea>
        <input class="submit-btn" type="submit" name="submit" value="submit">
    </form>
</section>
<?php include './templates/footer.php'; ?>