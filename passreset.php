<html>
<body>
	<?php 
		include 'datalogin.php';
		session_start(); 
		
		//loop to make sure form was filled out correctly
		$code = $_SESSION['code'];
		$email = $_SESSION['email'];
		if(!empty($_GET["newpass1"])){
			if($_GET["resetcode"] == $code){
				if(($_GET["newpass1"]) == ($_GET["newpass2"])){
					//if all form credentials are met password is updated in access
					
					//this is not working
					echo $_GET["newpass1"];
					echo $email;
					$qry = "UPDATE tblStudents SET password = " . $_GET['newpass1'] . "WHERE email='ajwhite2206@lcmail.lcsc.edu'";
					$query = $conn->prepare(/*"UPDATE tblStudents SET password = ? WHERE email='ajwhite2206@lcmail.lcsc.edu'"*/$qry);
					//$query->bindParam(1, $_GET["newpass1"], PDO::PARAM_STR);
					//$query->execute();
					while($r = $query->fetch(PDO::FETCH_OBJ)){
						echo 'should be successful';
					}
					
					
				/* 	thisworksssss
					$query = $conn->query("UPDATE tblStudents SET password = 'warrior' WHERE email='ajwhite2206@lcmail.lcsc.edu'");
					while($r = $query->fetch(PDO::FETCH_OBJ)){
					} */
					
					 

				// this is all the error handling if the form was not filled out correctly
				} else {
					echo 'Passwords do not match.';
				}
			} else {
				echo 'Invalid reset credential';
			} 
		} else {
			echo 'All Fields Required';
		}
 	
	
	?></p>
	
	<!-- beginning of HTML form -->
	<form action="passreset.php" method="get">
		<h2>Password Reset</h2>
		<p>Email sent: <?php echo $_SESSION['savedemail'];?></p>
		<input name="resetcode" id="resetcode" type="text" class="form-control" placeholder="Reset Code" autofocus></br>
		<input name="newpass1" id="newpass1" type="text" class="form-control" placeholder="New Password" autofocus></br>
		<input name="newpass2" id="newpass2" type="text" class="form-control" placeholder="Repeat New Password" autofocus></br>
		<button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
	

</body>
</html>