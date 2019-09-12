<?php

if(isset($_GET['edit_user'])) { 

$the_user_id = $_GET['edit_user'];


        $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        $select_users_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_users_query)) {
        $user_id =  $row['user_id']; 
        $username =  $row['username'];
        $user_password =  $row['user_password'];
        $user_firstname =  $row['user_firstname'];
        $user_lastname =  $row['user_lastname'];
        $user_email =  $row['user_email'];
        $user_image =  $row['user_image'];
        $user_role =  $row['user_role'];
        // $randSalt =  $row['randSalt'];




        }

}


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

    $query="SELECT randSalt FROM users";
    $select_randsalt_query = mysqli_query($connection, $query);
    if(!$select_randsalt_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }


    $row  = mysqli_fetch_array($select_randsalt_query);
    $salt = $row['randSalt'] ;
    $hased_password = crypt($user_password, $salt);


    $query = "UPDATE users SET ";
    $query .="user_firstname = '$user_firstname',";
    $query .="user_lastname = '$user_lastname',";
    $query .="user_role = '$user_role',";
    $query .="username = '$username',";
    $query .="user_email = '$user_email',";
    $query .="user_password = '$hased_password' ";
    $query .="WHERE user_id = $the_user_id";


    $edit_user_query = mysqli_query($connection, $query);

     confirmQuery($edit_user_query );

    }



?>




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
        
    <option value="<?php echo $user_role; ?>" ><?php echo $user_role; ?></option>

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
    <input class="btn btn-success" type="submit" name="edit_user" value="Add User">
</div>




</form>

