<?php
	session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

	$stmt = mysqli_prepare($connect, "SELECT * FROM users WHERE login = ? AND password = ?;");
	mysqli_stmt_bind_param($stmt, "ss", $login, $password);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $rid, $rlogin, $rpassword, $raddress, $rstatus);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);

	if ($rlogin == $login and $rpassword == $password) {
		$_SESSION['user'] = [
			"uid" => $rid,
			"login" => $rlogin,
			"address" => $raddress,
			"status" => $rstatus
	    ];

        header('Location: ../profile');
    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../signin');
    }

?>

<pre>
    <?php
    	print_r($check_user);
   		print_r($user);
    ?>
</pre>
