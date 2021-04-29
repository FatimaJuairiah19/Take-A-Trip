<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn= mysqli_connect('localhost','rootNew','Yes','user');
//check connection

if(!$conn){
 
 echo "connection error".mysqli_connect_error();

}


	 else {
	 	echo "connected to database".mysqli_connect_error();

		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		header('Location: login1.php');
		$stmt->close();
		$conn->close();
	}
?>