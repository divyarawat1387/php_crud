<?php

    session_start();
    //Database Connection
    include 'config.php';

    if(isset($_POST['submit']))
    {   
        if($_POST['update_id'] == '')
        {
            $title = $_POST['title'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_FILES['image_upload']['name'];
            $created_at = date('y-m-d H:i:s');
            $user_id = $_SESSION["user_id"];
          
            if(isset($_FILES["image_upload"]["name"]) && $_FILES["image_upload"]["name"] != null )
            {
                $filename = $_FILES["image_upload"]["name"];
                $tempname = $_FILES["image_upload"]["tmp_name"];
                move_uploaded_file($tempname,"article_images/".$filename);
            }
        // print_r($filename); exit;
            $sql = "INSERT INTO article(user_id,name,title,description,image,created_at) values ('".$user_id."','".$name."','".$title."','".$description."' , '".$filename."','".$created_at."')";

            if ($conn->query($sql) == TRUE) {
                //echo "New record created successfully";
                header("location:article_list.php");
              }
              else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
          }
          
          else
          {
            $article_id = $_POST['update_id'];
            $title = $_POST['title'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_FILES['image_upload']['name'];
            $updated_at = date('y-m-d');

            $_SESSION['edit_id'] = $article_id;

            if(isset($_FILES["image_upload"]["name"]) && $_FILES["image_upload"]["name"] != null )
            {
                $filename = $_FILES["image_upload"]["name"];
                $tempname = $_FILES["image_upload"]["tmp_name"];
                move_uploaded_file($tempname,"article_images/".$filename);
            }
            // print_r($filename); exit;

              $sql = "UPDATE article SET Name='".$name."' , title='".$title."' , description='".$description."', image='".$filename."' ,updated_at='".$updated_at."' WHERE id='".$article_id."'";

              if ($conn->query($sql) == TRUE) {
                //echo "New record created successfully";
                header("location:article_list.php");
              }
              else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
          }
    }
?>