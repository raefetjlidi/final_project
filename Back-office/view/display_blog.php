<?php 
include ('../controller/crudBlog.php');
$crud = new crudBlog();
$response = $crud->afficherblogs($crud->conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Display Blogs </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!--_navbar.php -->
    <?php 
    include_once('_navbar.php');
    ?>
    <!-- end _navbar.php -->

    <div class="container-fluid page-body-wrapper">
      <!--_settings-panel.php -->
      <?php 
      include_once('_settings-panel.php');
      ?>
      <!-- end _settings-panel.php -->

      <!-- end _sidebar.php -->
      <?php 
      include_once('_sidebar.php');
      ?>
      <!-- end _sidebar.php -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Blogs table</h4>
                  <!--<p class="card-description">
                    Add class <code>.table-bordered</code>
                  </p> -->
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Categorie
                          </th>
                          <th>
                            Content
                          </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Date
                          </th>
                          <th>
                            Editor
                          </th>
                          <th>
                            Comments
                          </th>
                          <th>
                            Delete
                          </th>
                          <th>
                            Update
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       
                            <?php 
                            while($row = $response->fetch())
                            { 
                            ?>
                             <tr>
                                <td>
                                  <?php echo $row["id_blog"] ?>
                                </td>
                                <td>
                                <?php echo $row['nom_blog'] ?>
                                </td>
                                <td>
                                <?php echo $row['categorie_blog'] ?>
                                </td>
                                <td>
                                <?php echo $row['contenu_blog'] ?>
                                </td>
                                <td>
                                <img src=<?php echo $row['image_blog'] ?> >
                                </td>
                                <td>
                                <?php echo $row['date_blog'] ?>
                                </td>
                                <td>
                                <?php  echo $row['nom_editeur'] ?>
                                </td>
                                <td>
                                  <form action="display_comments.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="idblog" id="idblog" value="<?php echo $row["id_blog"] ?>">
                                    <button class="btn btn-outline-secondary btn-icon-text">
                                      <div class="col-sm-6 col-md-4 col-lg-3">
                                        <i class="mdi mdi-comment-text-outline"></i> 
                                      </div>
                                    </button>
                                  </form>

                                </td>
                                <td>
                                <form action="../helpers/supprimerblog.php" method="POST">
                                <button type="submit" name="id" value="<?php echo $row["id_blog"] ?>"class="btn btn-danger btn-icon-text">                                                    
                                 Delete
                                </button>
                                </form>
                                </td>
                                <td>
                                <form action="update_blog.php" method="post" enctype="multipart/form-data">
                                <button type="submit" name="id" value="<?php echo $row["id_blog"] ?>" class="btn btn-outline-secondary btn-icon-text">
                                  Edit                       
                                </button>
                                </form>
                                </td>
                            </tr>
                                <?php
                            }
                            $response->closeCursor();
                            ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- _footer.php -->
        <?php 
        include_once('_footer.php');
        ?>
        <!-- end _footer.php -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/template.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>