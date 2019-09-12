    <?php
    include "includes/db.php";

     include "includes/header.php";


?>

    <!-- Navigation -->
    <?php
include "includes/navigation.php";

?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->


            <div class="col-md-8">
            <?php
               $query = "SELECT * FROM posts WHERE supprimer =0";
               $select_all_posts_query = mysqli_query($connection, $query);
               while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                   $post_id = $row['post_id'];
                   $post_title = $row['post_title'];
                   $post_auther = $row['post_auther'];
                   $post_date = $row['post_date'];
                   $post_image = $row['post_image'];
                   $post_content =$row['post_content'];
                   $post_statuts = $row['post_statuts'];


                   if($post_statuts !== 'Draft') {

                   

                   




                   

                //    $post_content =substr($row['post_content'],0,50) ;
           ?>
               

            <h1 class="page-header">
           Joueurs Tennis
            <small>Biographie</small>
        </h1>

        <!-- First Blog Post -->
        <h2>
            <a href="post.php?p_id=<?php echo $post_id; ?> "><?php echo $post_title ?> </a>
        </h2>
        <p class="lead">
            Par <a href="index.php"><?php echo $post_auther ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
        <hr>

        <a href="post.php?p_id=<?php echo $post_id; ?> ">
           <img class="img-responsive" src="images/<?php echo $post_image ;?>" alt="">
        </a>

        <hr>
        <p><?php echo $post_content ?></p>
        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?> ">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        


        <hr>


         <?php } } ?>

            

          

            </div>






            <!-- Blog Sidebar Widgets Column -->
               <?php
                include "includes/sidber.php";

                ?>
        </div>
        <!-- /.row -->

        <hr>
        <?php
include "includes/footer.php";

?>
       