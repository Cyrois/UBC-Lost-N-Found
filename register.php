
<?php

	ini_set('display_errors', 'On');
    error_reporting(E_ALL | E_STRICT);

    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    /*
    	// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
*/

    $conn = mysqli_connect("localhost", "root", "hotmail33");

    if(mysqli_connect_errno()) 
    {
        echo "failed to connect" . mysqli_connect_error();
    }

    mysqli_select_db($conn,"lostnfound");

    $searchUser = "select * from user where email='$email'";

    $result=mysqli_query($searchUser);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

	//check if that email is already registered
	if($count>0){
		$insert = "insert into user values ('$email', '$pass', '$name', '$phone')";

		if (mysqli_query($conn, $insert)) {
			header('Location: homepage.html');
			exit;		   
 		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		/*
		 //hash the password
        $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

        //create the activation code
        $activasion = md5(uniqid(rand(),true));
        */
	}
	else {
		echo "That email is already registered";
	}

    mysqli_close($conn);
?>