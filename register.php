<?php
        error_reporting(-1);
        session_start();

        //Database Connection
        include 'config.php';
    try{
        if(isset($_POST['submit']))
        {
            // print_r($_POST); exit;
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender    = $_POST['gender'];
            $email = $_POST['email'];
            $mobile_no = $_POST['mobile_no'];
            $password = $_POST['password'];
            $current_date = date('y-m-d H:i:s');
            $hobbies = $_POST['hobbies'];

            // $hobbies = implode(',',$_POST['hobbies']);
            
            $query = "INSERT INTO users (first_name,last_name,gender,email,mobile_no,user_password,join_date) Values ('".$first_name."','".$last_name."','".$gender."','".$email."','".$mobile_no."','".md5($password)."','".$current_date."')";
            
            if ($conn->query($query) === TRUE) {
                $last_id = $conn->insert_id;
                // print_r($hobbies); exit;
                foreach($hobbies as $value)
                {
                    // print_r($value); 
                    $query = "INSERT INTO hobby (user_id,hobby,created_at) VALUES ('".$last_id."','".$value."' , '".$current_date."')";
                    $conn->query($query);
                }
                header("location:login.php");
                
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }  

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;            
        }
        mysqli_close($conn);
    }
    catch(Error $e)
    {
        echo ($e);
    }
    
?>