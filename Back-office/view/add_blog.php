<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- _navbar.php -->
      <?php 
      include_once('_navbar.php');
      ?>
    <!-- end _navbar.php -->

    <div class="container-fluid page-body-wrapper">
    <!-- _settings-panel.php -->
      <?php 
      include_once('_settings-panel.php')
      ?>
    <!-- end _settings-panel.php -->


    <!-- _sidebar.php -->
      <?php 
      include_once('_sidebar.php');
      ?>
    <!-- _sidebar.php -->

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  <p class="card-description">
                    Basic form elements
                  </p>
                  <form action="../helpers/ajouterblog.php" method="post" class="forms-sample" enctype="multipart/form-data" name="addBlog">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" name="name" id="nameBlog" placeholder="Name" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Categorie</label> <!-- zid categorie -->
                      <input type="text" class="form-control"  name="categorie" id="categorieBlog" placeholder="Categorie" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Editeur</label>
                      <input type="text" class="form-control"  name="editeur" id="editeurBlog" placeholder="Editeur">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Contenu</label>
                      <textarea class="form-control"  name="contenu" id="contenuBlog" rows="4" ></textarea>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" id="image" class="file-upload-default"  >
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" >
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2" onclick="Verif()">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  <p style="color: red;" id="erreur"></p>
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
  <script src="../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../assets/vendors/select2/select2.min.js"></script>
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
  <script src="../assets/js/file-upload.js"></script>
  <script src="../assets/js/typeahead.js"></script>
  <script src="../assets/js/select2.js"></script>
  <!-- End custom js for this page-->

  <!-- controle saisie -->
  <script src="../assets/js/app.js"></script>
  <!-- end controle saisie -->
</body>

</html>