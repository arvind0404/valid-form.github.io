<?php
require_once 'dbcon.php';
if(isset($_POST['update'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$password=$_POST['password'];
	$password=md5($password);
	$id=$_POST['id'];
	$sql="UPDATE valid SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE id='$id'";
	$run=mysqli_query($con,$sql);
	if($run){
		?>
		<script type="text/javascript">
			alert('Data updated successfully');
			window.open('index.php','_self');
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert('Data not  updated');
			window.open('index.php','_self');
		</script>
		<?php
	}
}
?>