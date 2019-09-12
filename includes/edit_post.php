<?php

if(isset($_GET['p_id'])){
    
    $the_post_id = $_GET['p_id'];
    // $post_id =  $row['post_id']; 

   

}
 
        $query="SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_posts_by_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc( $select_posts_by_id)) {
        $post_id =  $row['post_id']; 
        $post_auther =  $row['post_auther'];
        $post_title =  $row['post_title'];
        $post_category_id =  $row['post_category_id'];
        $post_statuts =  $row['post_statuts'];
        $post_image =  $row['post_image'];
        $post_content =  $row['post_content'];
        $post_tags =  $row['post_tags'];
        $post_comment_count =  $row['post_comment_count'];
        $post_date =  $row['post_date'];

        }

if(isset($_POST['update_post'])) {
 
     $post_auther =  $_POST['post_auther'];
    $post_title =  $_POST['post_title'];
    

    $post_category =  $_POST['post_category'];
    $post_statuts =  $_POST['post_statuts'];
    $post_image =  $_FILES['image']['name'];
    $post_image_temp =  $_FILES['image']['tmp_name'];
    
    $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
    $post_tags =  $_POST['post_tags'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)) {
    
        $query= "SELECT * FROM posts WHERE post_id = $the_post_id ";
          
        $select_image= mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($select_image)){
            $post_image= $row['post_image'];
        }
    }




    $query = "UPDATE posts SET ";
    $query .="post_title = '$post_title',";

    $query .="post_category_id = '$post_category',";
    $query .="post_date = '$post_date',";
    $query .="post_auther = '$post_auther',";
    $query .="post_statuts = '$post_statuts',";
    $query .="post_tags = '$post_tags',";
    $query .="post_content= '$post_content',";
    $query .="post_image = '$post_image' ";
    $query .="WHERE post_id = $the_post_id";

    $update_post = mysqli_query($connection, $query);
    // print_r($update_post);
    confirmQuery($update_post);
echo "<p class='bg-warning'>Post Update. <a href='../post.php?p_id={$the_post_id}'> View Post </a> Or <a href='posts.php' >Edit More Posts</a> </p>";
  
}

?>






<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <Label for="title">Post Title</Label>
    <input value="<?php echo $post_title;  ?>" type="text" class="form-control" name="post_title">
</div>

<div class="form-group">



<select name="post_category" id="">
<option value="Sport" disabled selected>Tournois</option>



<?php
        $query="SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);

            confirmQuery($select_categories);
            while($row = mysqli_fetch_assoc( $select_categories )){
            $cat_id =  $row['cat_id'];
            $cat_title =  $row['cat_title'];

        echo "<option value='$cat_id'>{$cat_title}</option>";

        }

?>

</select>
   
</div>

<div class="form-group">
    <Label for="title">Post Auther</Label>
    <input value="<?php echo $post_auther;  ?>" type="text" class="form-control" name="post_auther">
</div>
<div class="form-group">
<select name="post_statuts" id="">

<option value='<?php echo $post_statuts; ?>'><?php echo $post_statuts ; ?></option>
<?php
if($post_statuts == 'published' ) {
    echo "<option value='draft'>Draft</option>";

}else{
    echo "<option value='published'>Publish</option>";

}




?>
</select>
</div>

<div class="form-group">
    <Label for="post-image">Post Image</Label><br>
    <img width="100" src="../images/<?php echo $post_image;  ?>" alt="">
    <input type="file" name="image">

</div>

<div class="form-group">
    <Label for="post-tags">Post Tags</Label>
    <input  value="<?php echo $post_tags;  ?>" type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <Label for="post-content">Post content</Label>
    <textarea class="form-control"  name="post_content" id="" cols="30" rows="10"><?php echo $post_content;  ?>
    </textarea>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
<!-- </head>
<body>
  <textarea>Next, use our Get Started docs to setup Tiny!</textarea> -->

<div>
    <input class="btn btn-success" type="submit" name="update_post" value="Update post">
</div>




</form>