<?php 
//connection to the mysql server
//why is this important? why does local host have to be first?
//the host name localhost has a special meaning. it is bound to the use of unix domain sockets. 
//it is not possible to opan a tcp/ip connection using the hostname localhost
//$mysqli->connect error then we want it to die and have this message
$mysqli = new mysqli('localhost' , 'root' , 'root' , 'todo');//task is the name of the database
if ($mysqli-> connect_errno) {
	die('Connect Error(' . $mysqli->connect_errno . ')' 
	. $mysqli->connect_error);
}else{
	//echo "Connection Made";

}
$mysqli->close();
?>