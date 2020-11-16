<?php
$dbc = mysqli_connect('localhost', 'root', 'root', 'form');
if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    if(!empty($username) && !empty($password1) && !empty($password2) && (
        $password1 == $password2)) {
        $query = "SELECT * FROM `signup` WHERE username = '$username'";
        $data = mysqli_query($dbc, $query);
        if(mysqli_num_rows($data) == 0) {
            $query = "INSERT INTO `signup` (username, password) VALUES ('$username', SHA('$password1'))"; //SHA Шифрую пароль
            mysqli_query($dbc, $query);
            echo 'Усе готово можете авторизуватись';
            mysqli_close($dbc);
            exit();
        } else {
            echo 'Логін уже існує';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авто прокат</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
</head>
<body class="bgReg">
    <header class="menu">

    <label for="checkbox-menu">
            <ul class="menu touch">
                <li><a class = "logo" href="Index.html">RAILWAY</a></li>
                <li><a href="Index.html">Home</a></li>
                <li><a href="Rent_page.php">Buy Online</a></li>
                <li><a href="admin.html">Route Schedule</a></li>
                <li><a href="history_rent.html">Cart</a></li>
                <li><a href="Signup.php">Registration</a></li>
                <li><a href="audentefication.php">Audentification</a></li>
            </ul>
        </label>
            
    </header>
    

	<div class="main-signin">
		<div class="main-signin__head">
			<p>Audentificate</p>
		</div>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="main-signin__middle">
			<div class="middle__form">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="text" name="username" placeholder="Input your login">
                <input type="password" name="password1" placeholder="Input your Password">
                <input type="password" name="password2" placeholder="Check password">
                <input type="submit" name="submit" value="SEND">
            </form>
			</div>
		</div>
		<div class="main-signin__foot">
			<div class="foot__left">
				<p>Submit abroud:</p>
			</div>
			<div class="foot__right">
				<div class="twit"><a href="#"></a></div>
				<div class="face"><a href="#"></a></div>
			</div>
		</div>
	</div>
    
    <script src="Script.js"></script>
    
</body>
</html>