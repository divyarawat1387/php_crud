<?php

    // Turn off all error reporting
    // error_reporting(0);
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    include 'config.php';

    try{
        if(isset($_POST['update']))
        {
            
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email      = $_POST['email'];
            $mobile_no  = $_POST['mobile_no'];
            $image      = $_FILES['image_upload']['name'];
            $gender     = $_POST['gender'];
            $use_id     = $_POST['user_id'];
            $hobbies    = $_POST['hobbies'];
            $current_date = date('y-m-d h:i:s');

            // $hobbies = implode(',',$_POST['hobbies']);
            // print_r($hobbies); exit;

            if(isset($_FILES["image_upload"]["name"]) && $_FILES["image_upload"]["name"] != null )
            {
                $filename = $_FILES["image_upload"]["name"];
                $tempname = $_FILES["image_upload"]["tmp_name"];
                move_uploaded_file($tempname,"user_images/".$filename);
            }

            $sql = "UPDATE users SET first_name='".$first_name."' , last_name='".$last_name."' , email='".$email."', mobile_no='".$mobile_no."' , image='".$filename."', gender='".$gender."' WHERE id='".$use_id."'";

            if ($conn->query($sql) == TRUE)
                {
                    $query = "DELETE FROM hobby where user_id = $use_id" ;
                    mysqli_query($conn, $query);
                    
                    foreach($hobbies as $value)
                    {
                        $query1 = "INSERT INTO hobby(user_id,hobby,created_at) VALUES ('".$use_id."','".$value."','".$current_date."')";
                        // print_r($query1); exit;
                        $conn->query($query1);
                    }
                //echo "New record created successfully";
                header("location:dashboard.php");
                }
            else 
            {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
        }
    }
catch(Error $e)
{
    echo "Error";
}
?>