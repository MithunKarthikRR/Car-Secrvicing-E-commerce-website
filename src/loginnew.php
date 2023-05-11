<?php 

session_start();
$con = mysqli_connect('localhost','root','','carservice1');



mysqli_select_db($con, 'carservice1');


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password1 = $_POST['password'];

		if(!empty($username) && !empty($password1))
		{

			//read from database
			$query = "select * from person where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result /*&& mysqli_num_rows($result) > 0*/)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password1'] === $password1)
					{

						$username = $user_data['username'];
						header("Location: index.html");
						die;
					}
				}
			}
			
			header("refresh:5;url=index.html");
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="username"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>