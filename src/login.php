<?php 

session_start();
$con = mysqli_connect('localhost','root','','carservice1');



mysqli_select_db($con, 'carservice1');


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password1 = $_POST['password1'];

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
						//header("Location: index.html");
						header("refresh:0.5;url=index.html");
						die;
					}
				}
			}
			
			
		}else
		{
			echo '<script>alert("invalid!")</script>';
			
		}
	}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>


<body>
    <div class="form" >
    <p><b>LOGIN</b></p>
    <form  onsubmit="" action= "" method="POST" >
    
        <input required name="username" type="text" id="username" placeholder="Customer ID">
        <input required name="password1"type="password" id="password1" placeholder="password">
        <button required name="rohith" type ="submit">Login</button>
        <p class="message">Not registered? <a href="Sign up.html">Create an account</a></p>
    </form>
    </div>
</body>

</html>
