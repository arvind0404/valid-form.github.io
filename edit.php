<?php
require_once 'dbcon.php';
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="SELECT * FROM valid WHERE id='$id'";
	$run=mysqli_query($con,$sql);
	$data=mysqli_fetch_assoc($run);
}
?>
<table border="1" align="right">
	<form method="post" action="editdata.php">
		<tr>
			<th colspan="2" align="center">Update Full Valid</th>
		</tr>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $data['name'];?>"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" value="<?php echo $data['email'];?>"></td>
		</tr>
		<tr>
			<td>Mobile:</td>
			<td><input type="text" name="mobile" value="<?php echo $data['mobile'];?>"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<input type="hidden" name="id" value="<?php echo $data['id'];?>">
				<input type="submit" name="update" value="Update">
			</td>
		</tr>
	</form>
</table>