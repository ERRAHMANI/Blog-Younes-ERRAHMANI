<?php include "includes/admin_header.php";?>


<?php
       if(isset($_SESSION['username'])) {
       
       $username = $_SESSION['username'];
       $query = "SELECT * FROM users WHERE username = '$username' ";
       $select_user_profile_query = mysqli_query($connection, $query);
       while($row = mysqli_fetch_array($select_user_profile_query)) {

        $user_id =  $row['user_id']; 
        $username =  $row['username'];
        $user_password =  $row['user_password'];
        $user_firstname =  $row['user_firstname'];
        $user_lastname =  $row['user_lastname'];
        $user_email =  $row['user_email'];
        $user_image =  $row['user_image'];
        $user_role =  $row['user_role'];

       }

    }
?>

<?php
     if(isset($_POST['edit_user'])) {
   
        // $user_id =  $_POST['user_id'];
        $user_firstname=  $_POST['user_firstname'];
        
        $user_lastname=  $_POST['user_lastname'];
        $user_role =  $_POST['user_role'];
        $username =  $_POST['username'];
        $user_email =  $_POST['user_email'];
        $user_password =  $_POST['user_password'];
        $query = "UPDATE users SET ";
        $query .="user_firstname = '$user_firstname',";
        $query .="user_lastname = '$user_lastname',";
        $query .="user_role = '$user_role',";
        $query .="username = '$username',";
        $query .="user_email = '$user_email',";
        $query .="user_password = '$user_password' ";
        $query .="WHERE username = '{$username}' ";
    
    
        $edit_user_query = mysqli_query($connection, $query);
    
         confirmQuery($edit_profile_query );
    
        }
    
    ?>
    <?php

if(isset($_POST['edit_user'])) {
   
    // $user_id =  $_POST['user_id'];
    $user_firstname=  $_POST['user_firstname'];
    
    $user_lastname=  $_POST['user_lastname'];
    $user_role =  $_POST['user_role'];
    // $post_image =  $_FILES['image']['name'];
    // $post_image_temp =  $_FILES['image']['tmp_name'];

    $username =  $_POST['username'];
    $user_email =  $_POST['user_email'];
    $user_password =  $_POST['user_password'];



    // $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
    


    // $post_date =  date("Y-m-d");

    // move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "UPDATE users SET ";
    $query .="user_firstname = '{$user_firstname}',";

    $query .="user_lastname = '{$user_lastname}',";
    $query .="user_role = '{$user_role}',";
    $query .="username = '{$username}',";
    $query .="user_email = '{$user_email}',";
    $query .="user_password = '{$user_password}' ";
    $query .="WHERE username = '{$username}' ";


    $edit_user_query = mysqli_query($connection, $query);

     confirmQuery($edit_user_query );

    }




      ?>
    


      

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php";?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                          Bienvenue sur la page Admin
                            <small>Auteur</small>
                        </h1>
       
<form action="" method="post" enctype="multipart/form-data">

<div>
    
    <Label for="title">Prénom</Label>
    <input type="text" value="<?php echo $user_firstname ;?>" class="form-control" name="user_firstname">
</div>

<div class="form-group"><br>
    <Label for="post_statuts">Nom</Label>
    <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
</div>



<div class="form-group">
    <!-- <Label for="title">Post Category Id</Label><br> -->
    <select name="user_role" id="">
    <option value="subscriber" ><?php echo $user_role; ?></option>

    <?php
    if($user_role == 'admin'){
     echo   "<option value='subscriber'>Subscriber</option>";


    } else {
       echo "<option value='Admin'>Admin</option>";

    }



    ?> 

      
    </select>
</div>

<!-- 
<div class="form-group">
    <Label for="post-image">Post Image</Label>
    <input type="file" class="form-control" name="image">
</div> -->

<div class="form-group">
    <Label for="post_tags">Nom d'utilisateur</Label>
    <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
</div>

<div class="form-group">
    <Label for="user_email">Email</Label>
    <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email"> 
</div>

<div class="form-group">
    <Label for="user_password">Mot de passe</Label>
    <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password"> 
</div>

<div>
    <input class="btn btn-success" type="submit" name="edit_user" value="Add Profile">
</div>




</form>
    
    
    




                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/admin_footer.php";?>

    
