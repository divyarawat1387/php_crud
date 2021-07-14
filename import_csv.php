<?php

    include 'config.php';
try{
    if(isset($_POST["import"]))
    {
        $filename=$_FILES["file"]["tmp_name"];    
        if($_FILES["file"]["size"] > 0)
        {
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $sql = "INSERT into users (first_name,last_name,gender,hobbies,email,mobile_no,user_password,image,join_date) 
                    values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."')";
                    $result = mysqli_query($conn, $sql);
                // print_r($sql); exit;
                if(!isset($result))
                {
                    echo "<script type=\"text/javascript\">
                    alert(\"Invalid File:Please Upload CSV File.\");
                    window.location = \"user_list.php\"
                    </script>";    
                }
                else 
                {
                    echo "<script type=\"text/javascript\">
                    alert(\"CSV File has been successfully Imported.\");
                    window.location = \"user_list.php\"
                    </script>";
                }
            }
            fclose($file);  
        }
    } 
}
catch(Error $e)
{
    echo $e;
}  
?>