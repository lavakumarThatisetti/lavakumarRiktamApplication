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
	   #formdiv{
	   width:50%;
	   }
	   </style>
	   <script type="text/javascript">
		   function validation(){
				var id=document.getElementById("id").value;
				var name=document.getElementById("studentName").value;
				var email=document.getElementById("studentEmail").value;
				var age=document.getElementById("studentAge").value;
				var address=document.getElementById("studentAddress").value;
				var ck_id=/^[0-9]{3,5}$/;
				var ck_name = /^[A-Za-z ]{3,20}$/;
				var ck_age = /^[0-9]{2}$/;
				var errors = [];
				if (!ck_id.test(id)) {
				  errors[errors.length] = "Please Enter Valid Id .";
				  //alert("pleade enter valid id");  
				 }
				 if (!ck_name.test(name)) {
				  errors[errors.length] = "Please Enter a valid Name ." 
				 }
				 if(!ck_age.test(age)) {
				  errors[errors.length] = "Please Enter Valid Age.";
				 }
				 if(email==""){
				  errors[errors.length] = "Email Should Not Be Null.";
				 }
				 if(address=="") {
				  errors[errors.length] = "Please Enter address.";
				 }
				 if (errors.length > 0) {
				  reportErrors(errors);
				  return false;
				 }
				return true;
			}
			function reportErrors(errors){
			var msg = "Please Enter Valide Data...\n";
				 for (var i = 0; i<errors.length; i++) {
				 var numError = i + 1;
				  msg += "\n" + numError + ". " + errors[i];
				}
				 alert(msg);
			}
		   </script>
</head>
<body>
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
$sql = "SELECT id, studentname,studentemail,studentage,studentaddress FROM students where id=$id";
$result = mysql_query($sql) or die($sql);
$row =  mysql_fetch_row($result);
?>
<center><h2>Edit Student Form</h2></center>
		<div class="container" id="formdiv">
			<div class="row main">
				<div class="main-login main-center">
					<form class="" action="editdata.php" method="get">
					   <div class="form-group">
							<label for="id" class="cols-sm-2 control-label">Edit Your Id</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
									<input type="text" class="form-control" readonly="readonly" value="<?php echo $row[0];?>" name="id" id="id"  placeholder="Enter your Id"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="studentName" class="cols-sm-2 control-label">Edit Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" required class="form-control" value="<?php echo $row[1];?>" name="studentName" id="studentName"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="studentEmail" class="cols-sm-2 control-label">Edit Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
									<input type="email" required class="form-control" value="<?php echo $row[2];?>" name="studentEmail" id="studentEmail"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="studentAge" class="cols-sm-2 control-label">Edit Your Age</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
									<input type="text" required class="form-control" value="<?php echo $row[3];?>" name="studentAge" id="studentAge"  placeholder="Enter your Age"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="studentAddress" class="cols-sm-2 control-label">Edit Your Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
									<textarea required class="form-control" name="studentAddress" id="studentAddress"  placeholder="Enter Your Address"><?php echo $row[4];?></textarea>
								</div>
							</div>
						</div>

						<center><div class="form-group ">
							<input type="submit" class="btn btn-primary btn-lg btn-block login-button"  onclick="return validation();" value="Update Student"/>
						</div></center>
						
					</form>
				</div>
			</div>
		</div>
</body>
</html>