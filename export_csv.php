<?php

    include 'config.php';

    try{
        if(isset($_POST['export']))
        {
            header('Content-Type: text/csv; charset=utf-8');  
            header('Content-Disposition: attachment; filename=user_data.csv');  
            $output = fopen("php://output", "w");  
            fputcsv($output, array('id', 'First Name', 'Last Name', 'Mobile_no' ,'Email', 'Joining Date'));  
            $query = "SELECT id,first_name,last_name,mobile_no,email,join_date FROM users";  
            $result = mysqli_query($conn, $query);  
            while($row = mysqli_fetch_assoc($result))  
            {  
                fputcsv($output, $row);  
            } 
            
            fclose($output);
        }
    }
    catch(Error $e)
    {
        echo $e;
    }
?>