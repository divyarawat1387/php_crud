<?php

    include 'config.php';

    $user_id = $_REQUEST["user_id"];
    $title = $_REQUEST['title'];
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $created_at = date('y-m-d H:i:s');

    if(isset($_REQUEST['user_id']) && isset($_REQUEST['title']) && isset($_REQUEST['name']) && isset($_REQUEST['description']))
    {
        $sql = "INSERT INTO article(user_id,name,title,description,created_at) values ('".$user_id."','".$name."','".$title."','".$description."' , '".$created_at."')";

        if ($conn->query($sql)) 
        {
            echo json_encode(array('message' => 'Article Inserted Successfully','status'=>true));
        }
        else
        {
            echo json_encode(array('message' => 'Article Not Inserted.','status'=>false));
        }
    }
    else
    {
        echo json_encode(array('message' => 'Article Not Inserted.','status'=>false));
    }
?>