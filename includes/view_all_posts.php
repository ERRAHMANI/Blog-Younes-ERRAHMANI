<?php

if(isset($_POST['chekboxArray'])) {

 foreach($_POST['chekboxArray'] as $postValueId){

 $bulk_options = $_POST['bulk_options'];

switch($bulk_options) {

  case 'published':
 $query = "UPDATE posts SET post_statuts = '{$bulk_options}' WHERE post_id= {$postValueId} ";

    $update_to_published_statuts = mysqli_query($connection, $query);

    confirmQuery($update_to_published_statuts);

  break;

  case 'draft':
  $query = "UPDATE posts SET post_statuts = '{$bulk_options}' WHERE post_id= {$postValueId} ";
 
     $update_to_draft_statuts = mysqli_query($connection, $query);
 
     confirmQuery($update_to_draft_statuts);
 
   break;

   case 'delete':
   $query = "DELETE FROM posts  WHERE post_id= {$postValueId} ";
  
      $update_to_delete_statuts = mysqli_query($connection, $query);
  
      confirmQuery($update_to_delete_statuts);
  
    break;
}

 }

}


?>

<form action="" method='post'>
<table class="table table-bordered table-hover">

      <div id="bulkOptionsContainer" class="col-xs-4" style="padding :0">

<select class="form-control" name="bulk_options" id="">

<option value="">Select Options</option>
<option value="published">Publish</option>
<option value="draft">Draft</option>
<option value="delete">Delete</option>

</select>
      </div>

      <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Appliquer">
        <a class="btn btn-primary" href="posts.php?source=add_post">Ajouter nouveau</a>
      </div>



                        <thead>
                            <tr>
                              <th><input id="selectAllBoxes" type="checkbox"></th>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Statuts</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>comments</th>
                                <th>Date</th>
                                <th>voir l'article</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                    </thead>
              <tbody>
                  
<?php
$query="SELECT * FROM posts WHERE supprimer =0";
            $select_posts = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc( $select_posts )){
            $post_id =  $row['post_id']; 
            $post_auther =  $row['post_auther'];
            $post_title =  $row['post_title'];
            $post_category_id =  $row['post_category_id'];
            $post_statuts =  $row['post_statuts'];
            $post_image =  $row['post_image'];
            $post_tags =  $row['post_tags'];

            $post_comment_count =  $row['post_comment_count'];
            $post_date =  $row['post_date'];

            echo"<tr>";

            ?>


<td><input class='checkBoxes' type='checkbox' name='chekboxArray[]' value='<?php echo $post_id;  ?>'></td>


             <?php
                echo"<td>{$post_id}</td>";
                echo"<td>{$post_auther}</td>";
                echo"<td>{$post_title}</td>";

                $query="SELECT * FROM categories WHERE cat_id= {$post_category_id} ";
                $select_categories_id = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc( $select_categories_id )){
                $cat_id =  $row['cat_id'];
                $cat_title =  $row['cat_title'];
                
                echo"<td>{$cat_title}</td>";
                }



                echo"<td>{$post_statuts}</td>";
                echo"<td><img width='150' class='img-responsive'  src='../images/$post_image' alt='image'></td>";

                echo"<td>{$post_tags}</td>";
                echo"<td>{$post_comment_count}</td>";
                echo"<td>{$post_date}</td>";
                echo"<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
                echo"<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                echo"<td><a onClick=\"javascript: return confirm('Etes-vous sûr que vous voulez supprimer'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";

            echo"</tr>";
            }
?>
                    
                      
             </tbody>
    </table>
    </form>
    <?php

   if(isset($_GET['delete'])){
     $the_post_id = $_GET['delete'];

  //  $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
  $query = "UPDATE posts SET supprimer = 1 WHERE post_id= {$the_post_id} ";

   $delete_query =mysqli_query($connection, $query);
  
   header("Location: posts.php");
   }


?>
