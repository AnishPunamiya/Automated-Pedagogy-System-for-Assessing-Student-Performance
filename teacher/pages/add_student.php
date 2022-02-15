<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
include '../includes/check_user.php';
$student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$department = $mydepartment;
$category = mysqli_real_escape_string($conn, $_POST['category']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$class = mysqli_real_escape_string($conn, $_POST['class']);
$division = mysqli_real_escape_string($conn, $_POST['division']);
$rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
$rollno = intval($rollno);

$sql = "SELECT * FROM tbl_users WHERE email = '$email' OR phone = '$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $sem = $row['email'];
	$sph = $row['phone'];
	if ($sem == $email) {
	 header("location:../students.php?rp=1189");	
	}else{
	
	if ($sph == $phone) {
	 header("location:../students.php?rp=2074");	
	}else{
		
	}
	
	}
	
    }
} else {

$sql = "INSERT INTO tbl_users (user_id, first_name, last_name, gender, dob, address, email, phone, department, category, class, division, rollno)
VALUES ('$student_id', '$fname', '$lname', '$gender', '$dob', '$address', '$email', '$phone', '$department', ' ', '$class', '$division', '$rollno')";

if ($conn->query($sql) === TRUE) {
  header("location:../students.php?rp=6310");
} else {
  header("location:../students.php?rp=9157");
}


}

$conn->close();
?>