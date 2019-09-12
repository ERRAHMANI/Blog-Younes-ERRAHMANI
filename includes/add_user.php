<?php
if(isset($_POST['create_user'])) {
   
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

    $query ="INSERT INTO users(user_firstname, user_lastname, user_role, username, 
    user_email, user_password) ";


    $query .=
    "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}',
    '{$user_email}', '{$user_password}') ";

    $create_user_query = mysqli_query($connection, $query);
    confirmQuery($create_user_query);

    echo "User Created: " . " " . "<a href=users.php>View Users</a> ";

//    header("location:posts.php");
}



?>




<form action="" method="post" enctype="multipart/form-data">

<div>
    <br>
    <Label for="title">Prénom</Label>
    <input type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
    <Label for="post_statuts">Nom</Label>
    <input type="text" class="form-control" name="user_lastname">
</div>



<div class="form-group">
    <!-- <Label for="title">Post Category Id</Label><br> -->
    <select name="user_role" id="">
    <option value="subscriber" disabled selected>Select options</option>
    <option value="Admin">Admin</option>
        <option value="subscriber">Subscriber</option>

      
    </select>
</div>

<!-- 
<div class="form-group">
    <Label for="post-image">Post Image</Label>
    <input type="file" class="form-control" name="image">
</div> -->

<div class="form-group">
    <Label for="username">Nom d'utilisateur</Label>
    <input type="text" class="form-control" name="username">
</div>

<div class="form-group">
    <Label for="user_email">Email</Label>
    <input type="email" class="form-control" name="user_email"> 
</div>

<div class="form-group">
    <Label for="user_password">Mot de passe</Label>
    <input type="password" class="form-control" name="user_password"> 
</div>

<div>
    <input class="btn btn-success" type="submit" name="create_user" value="Add User">
</div>




</form>

