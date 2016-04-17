<?php  
require 'database.php';
include 'base_header.php';

if (isset($_GET['success'])) {
?>

<div> Registration successful</div>

<?php
}

if(isset($_POST['submitform'])){
	
	if(!empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		if($pass==$_POST['passagain']){
			$query= "INSERT INTO switchcar VALUES ('','$fname','$lname','$email','$pass');";
			
			if (mysql_query($query)) {
				header("Location:sign.php?success");
			}else {
				echo'<div style="line-height:10em;size:7em;text-align:center;color:red;">Error inserting into database<br>
		<a href="index.php#testimonial" style="text-decoration:none;color:green;">Return</a>
	</div>';
				
			}

			

		}else{
?>
	<div style="line-height:10em;size:7em;text-align:center;color:red;">Passwords do not match<br>
		<a href="index.php#testimonial" style="text-decoration:none;color:green;">Return</a>
	</div>

<?php
		}


	}else{ 
		echo '<div style="line-height:10em;size:7em;text-align:center;color:red;">Please enter complete information<br>
		<a href="index.php#testimonial" style="text-decoration:none;color:green;">Return</a>
	</div>';
	}
}else header("Location:index.php");


include 'base_footer.php';

?>



