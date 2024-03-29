<?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php";?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         Bienvenue Sur la page Admin
                            <small>Auteur</small>
                        </h1>
                 
                        <div class="col-xs-6">
                    <?php insert_categories(); ?>
                 
                 

                        <form action="" method="post">

                        <div class="group-form">
                            <label for="cat_title">Add category</label>
                            <input type="text" class="form-control"  name="cat_title">
                        </div>
                        <br>
                        <div class="group-form">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                        </div>
                        </form>

                        <?php //UPDATE AND INCLUDE QUERY
                            
                            if(isset($_GET['edit'])) {
                              $cat_id = $_GET['edit'];
                            
                              include "includes/update_categories.php";
                            }
                       

                        ?>
                        </div>
                       
                        <div class="col-xs-6"> 


                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <?php findAllCategories(); ?>

                                        <?php deleteCategories() ;?> 
                                     

                                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/admin_footer.php";?>

    
