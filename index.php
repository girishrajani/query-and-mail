<html>
	
	<style type="text/css">
		.logo{
			height: 70px;
			width: 70px;
			text-align: center;
		}


	</style>
	<head>
		<title>
			Query Form
		</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"crossorigin="anonymous">
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body class="text-center" style="background-color:tomato;">
		<form  action="index.php" method="post">
			<h1> Query Form </h1>
			<h2>Name</h2>
			<input type="text" name="name">
			<br>
			<h2>Email</h2>
			<input type="email" name="email">
			<br>
			<h2>Subject</h2>
			<input type="text" name="subject">
			<br>
			<h2>Query</h2>
			<input type="text" name="query">
			<br><br>
			<input type="submit" name="submit" value="Submit" >
			<br>
			<br>
		</form>			
		<?php
		$server = "localhost";
		$username = "root";
		$password = "";
		$db = "details";
		$con = mysqli_connect($server,$username,$password,$db);

		if (!$con)
  		{
  			  die('Could not connect: ' . mysqli_error());
		}
		if(isset($_POST['submit'])){
			$name=$_POST['name'];
			$email=$_POST['email'];
			$query=$_POST['query'];
			$subject=$_POST['subject'];
			$sql="INSERT INTO details (name, email, query,subject) VALUES('$name','$email','$query','$subject')";
			if (!mysqli_query($con,$sql))
			{
			  die('Error: ' . mysqli_error($con));
			}
			else{
				if(! mail($email, $subject, "Your Query is Recived")) {
  					echo 'Message was not sent.';

				} else {
			  		echo 'Message has been sent.';
				}
			}
		}
			
		mysqli_close($con)
		?>
		</body>
</html>