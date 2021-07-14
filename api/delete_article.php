<?php

    include 'config.php';

    $article_id = $_REQUEST['article_id'];

    if(isset($_REQUEST['article_id']))
    {
        $sql = "DELETE FROM article where id = $article_id" ;
        mysqli_query($conn, $sql);

        if ($conn->query($sql)) 
        {
            echo json_encode(array('message' => 'Article Deleted Successfully','status'=>true));
        }
        else
        {
            echo json_encode(array('message' => 'Article is Not Deleted.','status'=>false));
        }
    }
    else
    {
        echo json_encode(array('message' => 'Article id is Required.','status'=>false));
    }
?>