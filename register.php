<html>
<head>
<title>Welcome</title>
</head>
<body>
<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	$name = $_POST["name"];
	$password = $_POST["password"];
        $email = $_POST["email"];

	$conn = mysqli_connect("localhost", "root", "hotmail33");

	if(mysqli_connect_errno()) 
	{
		echo "failed to connect" . mysqli_connect_error();
	}
	echo "connected successfully!";

	mysqli_select_db($conn,"test_db");

	$sql = "insert into user (name, password, email)
		values
		('$name', '$password', '$email')";
	if(!mysqli_query($conn, $sql)) 
	{
		die("error: " . mysqli_error($conn));
	}

	mysqli_close($conn);
?>
</body>
</html>
