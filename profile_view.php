<?php
    // error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();

    if(isset($_SESSION['email']) && !empty($_SESSION['password']) && !empty($_SESSION['user_id'])) {

    }
    else {
        header("location:login.php");
    }

    include 'config.php';

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * from users where id= $user_id";
    $result = $conn->query($sql); 
    $data = mysqli_fetch_assoc($result);

    $arr = $data['hobbies'];
    $hobby = explode(',',$arr);
    // print_r($hobby); exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
    <link rel="stylesheet" href="css/stylesheet2.css">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
  <?php include 'header.php' ?>
  <div class="content-wrapper">
  <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card border-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 my-2"> User Profile </h3>
                        </div>
                        <div class="card-body">
                            <form class="form" method="post"  action="profile_update.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">First Name</label>
                                    <span class="text-danger">
                                    
                                    </span>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="first_name" value="<?php echo $data['first_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="title">Last Name</label>
                                    <span class="text-danger">
                                    
                                    </span>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="last_name" value="<?php echo $data['last_name'] ?>">
                                </div>
                                <div class="form-group">
                                Gender :
                                Male<input type="radio"  name="gender" id="male" value="M"  style="margin: 10px;" <?php if($data['gender'] == 'M') echo 'checked="checked"'; ?>>
                                Female<input type="radio"  name="gender" id="female" value="F" style="margin: 10px;" <?php if($data['gender'] == 'F') echo 'checked="checked"'; ?>>
                                </div>
                            
                                <div class="form-group">
                                    <label for="body">Email</label>
                                    <span class="text-danger">
                                    
                                    </span>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $data['email'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="mobile_no">Mobile No</label>
                                    <span class="text-danger">
                                    </span>
                                    <input type="text" class="form-control" id="mobile_no" placeholder="Mobile No" name="mobile_no" value="<?php echo $data['mobile_no'] ?>">
                                </div>
                                <div class="form-group">
                                Hobbies :
                                
                                <input type="checkbox"  name="hobbies[]"  value="Books"  style="margin: 10px;" <?php if(in_array("Books",$hobby)) echo 'checked="checked"'; ?>>Books
                                <input type="checkbox"  name="hobbies[]"  value="Movies" style="margin: 10px;" <?php if(in_array("Movies",$hobby)) echo 'checked="checked"'; ?>>Movies
                                <input type="checkbox" name="hobbies[]" value="Travelling" style="margin: 10px;" <?php if(in_array("Travelling",$hobby)) echo 'checked="checked"'; ?>>Travelling
                                </div>

                                <div class="form-group">
                                    <label for="mobile_no">Profile Image</label>
                                    <span class="text-danger">
                                    </span>
                                    <input type="file" class="form-control" id="image_upload" name="image_upload">
                                </div>
                                <div>
                                    <img src="user_images/<?php echo $data['image']; ?>" alt="no image" height="100" width="100">
                                </div>
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $data['id']; ?>">
                                <p> 
                                    <input type="submit" value="Update" name="update" class="btn btn-success btn-lg float-right" onclick="return confirm('Are you sure want to update your profile');">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    

        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</body>
</html>