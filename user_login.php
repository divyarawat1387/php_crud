<?php

    session_start();

    //Database Connection
    include 'config.php';

    try {
        if(isset($_POST['submit']))
        {  
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $query = "SELECT * FROM users WHERE email='".$email."' and user_password='".md5($password)."'";
            // print_r($query); exit;
            
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                header("location:dashboard.php");

                $_SESSION['user_id'] = $row['id'];
                // $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password ;

                }
            } else {           
                header("location:login.php?error=1");
                // echo "Error: " . $query . "<br>" . $conn->error;
            }    
        }
    mysqli_close($conn);
    }
    catch(Error $e)
    {
        echo "Error";
    }
?>