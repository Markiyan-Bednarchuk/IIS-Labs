<?php
$dbc = mysqli_connect('localhost', 'root', 'root', 'but_online');
if(isset($_POST['submit'])) {
    $Point = mysqli_real_escape_string($dbc, trim($_POST['pointOfDeparture']));
    $Destination = mysqli_real_escape_string($dbc, trim($_POST['destination']));
    $Date = mysqli_real_escape_string($dbc, trim($_POST['date']));

    if(!empty($Point) && !empty($Destination) && !empty($Date)) {
        $query = "SELECT * FROM listbuy WHERE pointOfDeparture = '$Point'";
        $data = mysqli_query($dbc, $query);
        if(mysqli_num_rows($data) == 0) {
            $query = "INSERT INTO listbuy (pointOfDeparture, destination, date) VALUES ('$Point', '$Destination', '$Date')";
            mysqli_query($dbc, $query);
            echo 'Усе готово ваше замовлення прийнято';
            mysqli_close($dbc);
            exit();
        } else {
            echo 'Невірно оформлене замовлення';
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
			<p>RENT CONTRACT</p>
		</div>
		<div class="main-signin__middle">
			<div class="middle__form">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="text" name="pointOfDeparture" placeholder="Point Of Departure">
                    <input type="text" name="destination" placeholder="Destination">
                    <input type="text" name="date" placeholder="Date">
                    <input type="submit" name="submit" value="SEND">
                </form>
			</div>
		</div>
		<div class="main-signin__foot">
			<div class="foot__left">
				<p>Send order:</p>
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