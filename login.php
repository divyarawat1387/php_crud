<?php
	session_start();
	if (isset($_SESSION['email']) && !empty($_SESSION['password']) && !empty($_SESSION['user_id']))
	{
		header("location:dashboard.php");
	}          
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="center">
    <form action="user_login.php" method="post">
		<table>
			<tr>
				<td style="width: 33.33%;">
					<div class="dash"></div>
				</td>
				<td style="padding: 0 6px;">
					<h1>Login</h1>
				</td>
				<td style="width: 33.33%;">
					<div class="dash"></div>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<!-- <p>Create your account. It's free and only takes a minute.</p> -->
				</td>
			</tr>
			
			<tr>
				<td colspan="3">
					<div>
						<input type="email" placeholder="Email" name="email" id="email" required>
					</div>
				</td>
			</tr>
            
			<tr>
				<td colspan="3">
					<div>
						<input placeholder="Password" type="password" name="password" id="password" required>
					</div>
				</td>
			</tr>
			
			<tr>
				<td colspan="3">
					<div>
						<input type="submit" value="Login" name="submit">
					</div>
				</td>
			</tr>
		</table>
    </form>
	<?php
	if(isset($_GET['error'])==true)
	{
		echo '<p align="center" style="color:red;">Email and Password not match</p>';
	}
?>
		<footer>
			<p>Already have not an account? <a href="registration.php">Sign up</a></p>
		</footer>
	</div>
</body>
</html>
