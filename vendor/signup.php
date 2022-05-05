<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {
    
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: ../register');
        }

        $password = md5($password);

		$stmt = mysqli_prepare($connect, "INSERT INTO users SET login = ?, password = ?;");
		mysqli_stmt_bind_param($stmt, "ss", $login, $password);
		$stmtStatus = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	
        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register');
    }

?>
