<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: index');
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
    <form action="vendor/signup" method="post" enctype="multipart/form-data">
        <div class="signup-modal__content">
            <input class="signup-input" type="email" name="login" placeholder="Ваша почта" required>
            <input class="signup-input" type="password" name="password" placeholder="Придумайте пароль" required>
            <input class="signup-input" type="password" name="password_confirm" placeholder="Придумайте пароль" required>
            <span class="sign__desciption">Мы пришлем вам код на E-mail,<br>
            чтобы подвердить почту
            </span>
                <button class="sign__btn" type="submit">Регистрация</button>
                <?php
                    if ($_SESSION['message']) {
                        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                    }
                    unset($_SESSION['message']);
                ?>
        </div>
    </form>

    <div class="sign-modal__content">
        <span class="sign__register-text">У вас уже есть аккаунт?</span>
        <a class="sign__in-btn" href="./signin">Войти</a>
    </div>

</body>
</html>