<?php

session_start();
$mysqli = new mysqli('localhost', 'root', '', 'givepulse_test');
$id = 0;
$update = false;
$first_name = '';
$last_name = '';
$city = '';

if(isset($_POST['save'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city = $_POST['city'];

 	$mysqli->query("INSERT INTO users (first_name, last_name, city) VALUES('$first_name','$last_name', '$city')") or die($mysqli->error);
 	$_SESSION['message'] = "Record has been saved";
	$_SESSION['msg_type'] = "success";
	header("location: index.php");

}

if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM users WHERE id = $id");

	$_SESSION['message'] = "Record has been deleted";
	$_SESSION['msg_type'] = "danger";
	header("location: index.php");
}

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM users WHERE id = $id") or die($mysqli->error());
	// if(count($result)==1){
		$row = $result->fetch_array();
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$city = $row['city'];
	//}
}

if(isset($_POST['update'])){
	$id = $_POST['id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city = $_POST['city'];

	$mysqli->query("UPDATE users SET first_name='$first_name', last_name='$last_name', city='$city' WHERE id=$id");
	$_SESSION['message'] = "Record has been updated";
	$_SESSION['msg_type'] = "warning";
	header("location: index.php");
}

?>