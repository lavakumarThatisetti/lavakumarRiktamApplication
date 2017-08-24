<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<style type="text/css">
		.tablehead,.tablehead:hover{
			background-color:#ccc;
		}
		.pagination a{
			font-size:18x;
		}
		.pagination a {
			font-size:16px;
			float: left;
			padding: 8px 26px;
			text-decoration: none;
			transition: background-color .3s;
		}
		.pagination a:hover{
			background-color: #ddd;
		}
		.colorchange{
			background-color:#0000ff;
		}
		.aclass{
			color:#000;
		}
		</style>
		<script type="text/javascript">
			function delete_id(id)
			{
				 if(confirm('Sure You Want to delete the record no :'+id))
				 {
					window.location.href='delete.php?id='+id;
				 }
			}
		</script>
		<script type="text/javascript">
		 function active(id){
			if(id!=null){
				// alert(document.getElementById("#"+id));
			     id.className +=" colorchange";
				//alert(id);
			}
			 
			 
		 }
		</script>
</head>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "riktam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$i=0;
$var=1;
global $limitvalue;
$value=1;
$sql = "SELECT id, studentname,studentemail,studentage,studentaddress FROM students";
if(isset($_GET['page']) && $_GET['page']=="first"){
	$sql="SELECT id, studentname,studentemail,studentage,studentaddress FROM students ORDER BY id ASC LIMIT 5 OFFSET 0";
}
else if(isset($_GET['page']) && $_GET['page']=="last"){
	$result=$conn->query("SELECT count(*) as total from students");
	$data=$result->fetch_assoc();
	$total=$data['total'];
	$lastFive=$total-5;
	$sql="SELECT id, studentname,studentemail,studentage,studentaddress FROM students ORDER BY id ASC LIMIT 5 OFFSET $lastFive";
}
/*
else if(isset($_GET['page']) && $_GET['page']=="prev"){
	echo "limit value in prev= ".$limitvalue;
	if($limitvalue!=0){
	$limitvalue=$limitvalue-5;
	}else{
		$limitvalue=0;
	}
	$sql="SELECT id, studentname,studentemail,studentage,studentaddress FROM students ORDER BY id ASC LIMIT 5 OFFSET $limitvalue";
}
else if(isset($_GET['page']) && $_GET['page']=="next"){
	$value=($value-1)*5;
	$limitvalue=$value;
	
	//if(!isset($page_number))
      //   $page_number = (int)$_GET['page'] <= 0 ? 1 : (int)$_GET['page']; // grab the page number
  $page_number=0;
     if(isset($_GET['pages'])){
        echo "hello ".$page_number;
	 }else{
		 echo $page_number;
	 }
	$result=$conn->query("SELECT count(*) as total from students");
	$data=$result->fetch_assoc();
	$perpage=5;
	
	
	$totalValue=$data['total']-5;
	//echo $limitvalue."   ".$value;
	if($limitvalue!=$totalValue){
	$sql="SELECT id, studentname,studentemail,studentage,studentaddress FROM students ORDER BY id ASC LIMIT 5 OFFSET $limitvalue";
	$limitvalue=$limitvalue+5;
	}else if(($limitvalue-$data['total'])<5){
     $sql="SELECT id, studentname,studentemail,studentage,studentaddress FROM students ORDER BY id ASC LIMIT 5 OFFSET $limitvalue";
	}
	else {
		$sql="SELECT id, studentname,studentemail,studentage,studentaddress FROM students ORDER BY id ASC LIMIT 5 OFFSET $limitvalue";
	}
   // $value++;
} 
 */
 if(isset($_GET['pages'])){
	$page=$_GET['pages'];
	if($page==""||$page==1){
		$page1=0;
		$next=1;
	}else{
		$page1=($page*5)-5;
		$next=$page;
	}
	$sql="SELECT id, studentname,studentemail,studentage,studentaddress FROM students ORDER BY id ASC LIMIT $page1,5";
}
$result = $conn->query($sql);
?>
<center><h2>List Of Registred Students</h2></center>
<table class="table table-hover">
   <tr class="tablehead" style="background-color:#ccc;">
     <th>StudentId</th>
	 <th>StudentName</th>
	 <th>StydentEmail</th>
	 <th>StudentAge</th>
	 <th>StudentAddress</th>
	 <th>Edit Student</th>
	 <th>Delete Student</th>
   </tr>
  
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
     <tr>
    <td><?php echo $row["id"];?></td>
	<td><?php echo $row["studentname"];?></td>
	<td><?php echo $row["studentemail"];?></td>
	<td><?php echo $row["studentage"];?></td>
	<td><?php echo $row["studentaddress"];?></td>
	<td><a href="edit.php?id=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
	<td><a href="javascript:delete_id(<?php echo $row['id']; ?>);"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
            
	</tr>
<?php
    }
} else {
    echo "0 results";
}
?>
</table>
<center><div class="pagination">
  <a href="index1.php?page=first" id="doublearrow">&laquo;</a>
  <?php
  if(isset($_GET['pages'])){
       $var=$next-1;
  }
  ?>
  
  <a href="index1.php?pages=<?php echo $var;?>"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <?php  
    
	/*else if($var==0){
   ?>
    <a href="index1.php" style="color:black;" ><span class="glyphicon glyphicon-chevron-left"></span></a>
   <?php
	} */
  ?>
  <?php 
       $result=$conn->query("SELECT count(*) as total from students");
	   $data=$result->fetch_assoc();
	   $total=$data['total'];
	   $n=$total/5;
	   $n=ceil($n);
       for($i=1;$i<=$n;$i++){
   ?>
         <a class="aclass" id="<?php echo 'pages'.$i;?>" href="index1.php?pages=<?php echo $i;?>" onclick="active(this.id);"><?php echo $i;?></a>
   <?php
    }
	
	if(isset($_GET['pages'])){
		$colorchange=$_GET['pages'];
		if($colorchange==1){
	?>
	    <style>
		#pages1{
			color:#fff;
			background-color:#7FC3EC;
			border-radius:5px;
		}
		</style>
	<?php
		} else if($colorchange==2){
 	?>
	    <style>
		#pages2{
			border-radius:5px;
			color:#fff;
			background-color:#7FC3EC;
		}
		</style>
	<?php
		}
		else if($colorchange==3){
 	?>
	    <style>
		#pages3{
			border-radius:5px;
			color:#fff;
			background-color:#7FC3EC;
			
		}
		</style>
	<?php
		}
	$var=$next+1;
	}
	// echo $var;
	//if($var!=$n) {
   ?>
    
    <a href="index1.php?pages=<?php echo $var; ?>"><span class="glyphicon glyphicon-chevron-right"></span></a>
   <?php 
	//}
	/*
	else if($var==$n+1){
 ?>
		 <a href="index1.php" ><span class="glyphicon glyphicon-chevron-right"></span></a>
	<?php
	} */
   ?>
  
  <a href="index1.php?pages=<?php echo $i-1;?>" id="doublearrow">&raquo;</a>
</div>
</center>
<center><a class="btn btn-success" href="insertForm.html"><span class="glyphicon glyphicon-plus"></span> Add Student</a></center>
<?php
$conn->close();
?>