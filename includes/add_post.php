<?php
if(isset($_POST['create_post'])) {
   
    $post_title =  $_POST['title'];
    $post_auther =  $_POST['auther'];
    
    $post_category_id =  $_POST['post_category'];
    $post_statuts =  $_POST['post_statuts'];
    $post_image =  $_FILES['image']['name'];
    $post_image_temp =  $_FILES['image']['tmp_name'];

    $post_tags =  $_POST['post_tags'];

    $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
    


    $post_date =  date("Y-m-d");
    // $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query ="INSERT INTO posts (post_category_id, post_title, post_auther, post_date, post_image, 
    post_content, post_tags, post_statuts) ";


    $query .=
    "VALUES({$post_category_id},'{$post_title}','{$post_auther}','{$post_date}','{$post_image}',
    '{$post_content}', '{$post_tags}', '{$post_statuts}') ";

    $create_post_query = mysqli_query($connection, $query);
    confirmQuery($create_post_query);

    $the_post_id = mysqli_insert_id($connection);

    echo "<p class='bg-warning'>Post Created. <a href='../post.php?p_id={$the_post_id}'> View Post </a> Or <a href='posts.php' >Edit More Posts</a> </p>";


//    header("location:posts.php");
}



?>




<form action="" method="post" enctype="multipart/form-data">

<div>
    <Label for="title">Post Title</Label>
    <input type="text" class="form-control" name="title"> <br />
</div>

<div>
    <!-- <Label for="title">Post Category Id</Label><br> -->
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

<div>
    <br>
    <Label for="title">Post Auther</Label>
    <input type="text" class="form-control" name="auther">
</div>




<br>
<div class="form-group">
    <!-- <Label for="post_statuts">post_statuts</Label> -->

    <select name="post_statuts" id="">
<option value="draft">post_statuts</option>
<option value="Published">Published</option>
<option value="draft">Draft</option>


    </select>
    <!-- <input type="text" class="form-control" name="post_statuts"> -->
</div>

<div class="form-group">
    <Label for="post-image">Post Image</Label>
    <input type="file" class="form-control" name="image">
</div>

<div class="form-group">
    <Label for="post-tags">Post Tags</Label>
    <input type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <Label for="post-content">Post content</Label>
    <textarea class="form-control"  name="post_content" id="body" cols="30" rows="10">
    </textarea>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
  <!-- <textarea>Next, use our Get Started docs to setup Tiny!</textarea> -->

<div>





    <input class="btn btn-success" type="submit" name="create_post" value="publish post">
</div>




</form>
<!-- <script>
    $(document).ready(function(){
        //EDITOR
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
        //REST OF THE CODE
    });

</script> -->

