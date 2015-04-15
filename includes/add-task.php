<?php 
	$task = strip_tags($_POST['task']);
	$date = date('Y-m-d');
	$time = date('H:i:s');

	include('connect.php');// connecting to the connect.php


$mysqli = new msqli("localhost" , "root", "root", 'tasks');
$mysqli ->query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time')");
//the msqli querys all the things above into the data base
//then $query queries the task that we have to put it in there

$query = "SELECT * FROM tasks WHERE task='$task'  and date='$date' and time='$time'";

if ($result = $mtsqli->query($query)) {
	while ($row = $result->fetch_assoc()){
		$task_id = $row['id'];
		$task_name = $row['task'];
	}
}

$msqli->close;
 ?>