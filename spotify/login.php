?php
	// connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "spotify";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// retrieve user's login information
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = $conn->query($sql);

	// verify user's credentials
	if ($result->num_rows > 0) {
		// login successful, redirect to Spotify dashboard
		header("Location: dashboard.php");
		exit();
	} else {
		// login unsuccessful, display error message
		echo "Invalid username or password";
	}

	$conn->close();
?>