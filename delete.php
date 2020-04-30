<?php

require_once 'dbcon.php';
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="DELETE FROM valid WHERE id='$id'";
	$run=mysqli_query($con,$sql);
	if($run){
		?>
		<script type="text/javascript">
			alert('Data deleted successfully');
			window.open('index.php','_self');
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert('Data not  deleted');
			window.open('index.php','_self');
		</script>
		<?php
	}
}
?>