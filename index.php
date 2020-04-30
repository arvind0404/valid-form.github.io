<?php
require_once 'dbcon.php';
if(isset($_POST['submit'])){
	$name=strip_tags(trim($_POST['name']));
	$email=strip_tags(trim($_POST['email']));
	$mobile=strip_tags(trim($_POST['mobile']));
	$password=strip_tags(trim($_POST['password']));
	$namev=$emailv=$mobilev=$passwordv=false;
	if(!empty($name)){
		if(preg_match("/^[a-zA-Z]*$/", $name)){
			if(strlen($name)>2 && strlen($name)<12){
				$namev=true;
				echo "Everthing is ok !!<br>";
			}else{ echo "name should be greater than 2 and less than 12<br>";}
		}else{echo "only alphabats and white space allowed<br>";}
	}else{echo "the value of name cannot be blank<br>";	}
	if(!empty($email)){
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			$emailv=true;
			echo "Email is good!! <br>";
		}else{echo "Invalid email<br>";}
	}else{echo "the value of email cannot be blank<br>";}
	if(!empty($mobile)){
		if(strlen($mobile)>10 && strlen($mobile)<=12){
			if(preg_match("/^[0-9]+$/", $mobile)){
				$mobilev=true;
				echo "Mobile no  is good<br>";
			}else{echo "only number allowed<br?";}
		}else{echo "the lenth of the mobile no is 10<br>";}
	}else{echo "the value of email cannot be blank<br>";}
	if(!empty($password)){
		if(strlen($password)>2 && strlen($password)<10){
			$passwordv=true;
			echo "password is good";
		}else{echo "password lenth must be less than 10 and greater than 5<br>";}
	}else{echo "the password is required<br>";}
	if($namev && $emailv && $mobilev && $passwordv==true){
	$sql="INSERT INTO valid (name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";
	$run=mysqli_query($con,$sql);
	if($run){
		echo "<script>alert('data inserted');</script>";
		echo "<script>window.open('index.php','_self');<script>";
	}
	else{
		echo "There is an error: data not inserted<br>";
	}

}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Valid Form</title>
</head>
<body>
<table border="1" align="right">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<tr>
			<th colspan="2" align="center">Full Valid</th>
		</tr>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>Mobile:</td>
			<td><input type="text" name="mobile"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<input type="submit" name="submit" value="Submit">
			</td>
		</tr>
	</form>
</table>
</body>
</html>
<table align="center" border="1" width="40%">
	<tr>
		<th colspan="6">Your Data</th>
	</tr>
	<tr>
		<td>No</td>
		<td>Name</td>
		<td>Email</td>
		<td>Mobile</td>
		<td>Edit | Delete</td>
	</tr>
	<?php
	$sql="SELECT * FROM valid";
	$run1=mysqli_query($con,$sql);
	if(mysqli_num_rows($run1)>0){
	$count=1;
	while($data=mysqli_fetch_assoc($run1)){
		?>
		<tr>
			<td><?php echo $count;?></td>
			<td><?php echo $data['name']?></td>
			<td><?php echo $data['email']?></td>
			<td><?php echo $data['mobile']?></td>
			<td><a href="delete.php?id=<?php echo $data['id'];?>">Delete</a> | <a href="edit.php?id=<?php echo $data['id'];?>">Edit</a></td>
		</tr>

		<?php

		$count++;
	}
}
else{
	?>
	<tr>
		<td align="center" colspan="5"><h3>There is not database</h3></td>
	</tr>
	<?php
}


	?>
</table>