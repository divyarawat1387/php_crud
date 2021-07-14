<?php

    include 'config.php';

    $article_id = $_REQUEST['article_id'];
    $title = $_REQUEST['title'];
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $updated_at = date('y-m-d H:i:s');

    if(isset($_REQUEST['article_id']) )
    {
        $sql = "UPDATE article SET Name='".$name."' , title='".$title."' , description='".$description."' ,updated_at='".$updated_at."' WHERE id='".$article_id."'";

        if ($conn->query($sql)) 
        {
            echo json_encode(array('message' => 'Article Updated Successfully','status'=>true));
        }
        else
        {
            echo json_encode(array('message' => 'Article Not Updated.','status'=>false));
        }
    }
    else
    {
        echo json_encode(array('message' => 'Article Not Updated.','status'=>false));
    }

?>