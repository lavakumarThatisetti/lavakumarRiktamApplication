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
$studentName=$_GET["studentName"];
$studentEmail=$_GET["studentEmail"];
$studentAge=$_GET["studentAge"];
$studentAddress=$_GET["studentAddress"];
$sql = "update students SET studentname='$studentName',studentemail='$studentEmail',studentage='$studentAge',studentaddress='$studentAddress' WHERE id=$id";
$result = mysql_query($sql);
if($result){
	header('Location:index1.php');
}
else{
	echo "Error in updating";
}
?>