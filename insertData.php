<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "riktam";
 
$link = mysql_connect($servername, $username, $password); 
mysql_select_db($dbname,$link); 
?>
<?php
$id=$_POST["id"];
$studentName=$_POST["studentName"];
$studentEmail=$_POST["studentEmail"];
$studentAge=$_POST["studentAge"];
$studentAddress=$_POST["studentAddress"];
$sql="INSERT INTO students VALUES ($id,'$studentName','$studentEmail','$studentAge','$studentAddress')";
$result = mysql_query($sql) or die($sql);
if($result){
	header('Location:index1.php');
}
else{
	echo "Error in Inserting";
}
?>