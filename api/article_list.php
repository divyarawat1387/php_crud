<?php

    include 'config.php';

    $user_id = $_REQUEST['user_id'];

    $sql = "SELECT * from article where user_id= $user_id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
    	$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    	echo json_encode($output);
    }
    else
    {
    	echo json_encode(array('message'=> 'No Record Found', 'status' => false));
    }
?>