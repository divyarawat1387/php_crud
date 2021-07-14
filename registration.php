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
    <form action="register.php" method="POST" name="form" onSubmit = "return checkPassword(this)">
		<table>
			<tr>
				<td style="width: 33.33%;">
					<div class="dash"></div>
				</td>
				<td style="padding: 0 6px;">
					<h1>Register</h1>
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
						<input placeholder="First Name" type="text" name="first_name" id="first_name" required> <span>
						<input placeholder="Last Name" style="float: right;" type="text" name="last_name" id="last_name" required></span>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<div>
						Gender :
						Male<input type="radio"  name="gender" id="male" value="M"  style="margin: 10px;">
						Female<input type="radio"  name="gender" id="female" value="F" style="margin: 10px;"> 
					</div>
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
						<input type="number" placeholder="Mobile No" name="mobile_no" id="mobile_no" required>
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
						<input placeholder="Confirm Password" type="password" name="confirm_password" id="confirm_password" required>
					</div><span id = "message" style="color:red"> </span>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<div>
						Hobbies:
						<input type="checkbox"  name="hobbies[]"  value="Books"  style="margin: 10px;">Books
						<input type="checkbox"  name="hobbies[]"  value="Movies" style="margin: 10px;">Movies
						<input type="checkbox" name="hobbies[]" value="Travelling" style="margin: 10px;">Travelling
					</div>
				</td>
			</tr>
			<!-- <tr>
				<td colspan="3">
					<div class="terms">
						<input id="checkid2" type="checkbox" value="test"> <label for="checkid2">I accept the <a
								href="https://www.google.com/">Terms of Use</a> & <a
								href="https://www.google.com/">Privacy Policy.</a></label>
					</div>
				</td>
			</tr> -->
			<tr>
				<td colspan="3">
					<div>
						<input type="submit" value="Register Now" name="submit">
					</div>
				</td>
			</tr>
		</table>
    </form>
		<footer>
			<p>Already have an account? <a href="login.php">Sign in</a></p>
		</footer>
	</div>
</body>
</html>

<script>
          
    // Function to check Whether both passwords
    // is same or not.
    function checkPassword(form) {
        password1 = form.password.value;
        password2 = form.confirm_password.value;

        // If password not entered
        if (password1 == '')
            alert ("Please enter Password");
                
        // If confirm password not entered
        else if (password2 == '')
            alert ("Please enter confirm password");
                
        // If Not same return False.    
        else if (password1 != password2) {
            // alert ("\nPassword and Confirm did not match: Please try again...");
            document.getElementById("message").innerHTML = "Password and Confirm did not match: Please try again...";  
            return false;
        }

        // If same return True.
        else{
            // alert("Password Match: Welcome to GeeksforGeeks!")
            return true;
        }
    }
</script>