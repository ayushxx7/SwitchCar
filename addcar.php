<?php  
require 'database.php';
include 'base_header.php';

if (isset($_GET['success'])) {
	echo '<div style="size:2em;color:green;text-align:center;"> Added the car Successfully !!!</div>';
}


	if(isset($_POST['submitform'])){

		if(!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['rent'])){

		$name=$_POST['name'];
		$year=$_POST['year'];
		$rent=$_POST['rent'];
			$query= "INSERT INTO car VALUES ('','$name','$year','$rent');";

				if (mysql_query($query)) {
				header("Location:addcar.php?success");
			}else {
				echo'<div style="line-height:10em;size:7em;text-align:center;color:red;">Error inserting into database<br>
		<a href="index.php#testimonial" style="text-decoration:none;color:green;">Return</a>
	</div>';
				
			}


		}else echo "Please enter complete data";

	}else echo 'Please submit the form';

?>

<form action="" method="post" id="signupform" >

										<label for="name">Name :</label>
										<input type="text" name="name" style="margin-left: 9.8%"></input><br>

										<label for="year">Year :</label>
										<input type="text" name="year"style="margin-left: 10%"></input><br>
										
										<label for="rent">Rent per Hour :</label>
										<input type="text" name="rent"style="margin-left: 17%"></input><br>
																			
										<input type="submit" value="Add/Rent Car">	
										<input type = "hidden" name = "submitform">
</form>

					

<?php
$query = "SELECT * FROM car;";

if(mysql_query($query)){
	$query_run=mysql_query($query);
	while($res = mysql_fetch_object($query_run)){
?> <br><br>
	<div style="line-height:3em;color:black;size:4em;text-align:center;">
		Name : <?php echo $res->name; ?><br>
		Year : <?php echo $res->year; ?><br>
		Rent : <?php echo$res->rent; ?><br>
		<form action="rent.php">
			<input type="submit" value="Rent">
		</form>
	</div>

<?php	
	}
}


include 'base_footer.php';
?>