<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "riktam";
 
$link = mysql_connect($servername, $username, $password); 
mysql_select_db($dbname,$link); 
?>
<?php
$id=$_GET["id"];
$sql = "DELETE FROM students WHERE id=$id";
$result = mysql_query($sql);
if($result){
	header('Location:index1.php');
}
else{
	echo "Error in deleteing";
}
?>