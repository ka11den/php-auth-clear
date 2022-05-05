<?php
session_start();

if ($_SESSION['user']) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="vendor/signin.php" method="post">
        <div class="sign-modal__content">
            <input class="signup-input" type="email" name="login" placeholder="Ваша почта">
            <input class="signup-input" type="password" name="password" placeholder="пароль">
            <span class="signup__desciption"><a class="signup__desciption" href="forgotPassword">Забыли парль?</a>
                <div class="signup-checkbox">
                    <input type="checkbox" id="scales" name="scales"
                        checked>
                    <label for="scales">Запомнить</label>
                </div>
            </span>
            <button class="signup__btn" type="submit">Войти</button>
            <?php
                if ($_SESSION['message']) {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
        </div>
    </form>
</body>
</html>