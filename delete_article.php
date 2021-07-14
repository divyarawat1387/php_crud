<?php

    include 'config.php';
    
    $article_id = $_GET['delete_id'];
    try{
        $query = "DELETE FROM article where id = $article_id" ;
        mysqli_query($conn, $query);

        if($query)
        {
            header("location:article_list.php");
        }
        else
        {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
    catch(Error $e)
    {
        echo $e;
    }
?>