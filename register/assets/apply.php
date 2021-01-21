<?php
	$fullname = $_POST['fullname'];
	$fathername = $_POST['fathername'];
	$dob = $_POST['dob'];
	$mobile = $_POST['mobile'];
	$income = $_POST['income'];
	$email = $_POST['email'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into apply(fullname, fathername, dob, mobile, income, email) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $fullname, $fathername, $dob, $mobile, $income, $email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>