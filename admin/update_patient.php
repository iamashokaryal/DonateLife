<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("../include/config.php");
include("checkLogin.php");
$errMsg = '';
$id = "";
$name = "";
$mobile_number = "";
$email = "";
$gender = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {

  if (!isset($_GET['id'])) {
    header("Location: manage_patients.php");
    exit();
  }
  $id = $_GET['id'];

  // Use prepared statement to prevent SQL injection
  $sql = $conn->prepare("SELECT * FROM patient_reg WHERE id = ?");
  $sql->bind_param("i", $id);
  $sql->execute();
  $result = $sql->get_result();
  $row = $result->fetch_assoc();

  if (!$row) {
    header("Location: manage_patients.php");
    exit;
  }

  $name = $row["full_name"];
  $mobile_number = $row["mobile_number"];
  $email = $row["email"];
  $gender = $row["gender"];
}
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $id = $_POST['id'];
  $name= $_POST['name'];
  $mobile_number = $_POST['mobile_number'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];

  $sql = $conn->prepare("UPDATE patient_reg SET full_name = ?, mobile_number = ?, email = ?, gender = ? WHERE id = ?");
    $sql->bind_param("ssssi", $name, $mobile_number, $email, $gender,$id);

    if ($sql->execute()) {
      $successMsg = "Updated successfully";

        // header("Location: manage_patients.php");
        // exit();
    } else {
        $errMsg = "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../dash_resource/vendors/feather/feather.css">
  <link rel="stylesheet" href="../dash_resource/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../dash_resource/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../dash_resource/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../dash_resource/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../dash_resource/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../dash_resource/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../dash_resource/images/favicon.png" />
  <link rel="stylesheet" href="../dash_resource/css/vertical-layout-light/sweetalert.css">

</head>

<body>
<?php if ($successMsg): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
          Swal.fire({
        text: "Updated Successfully!",
        icon: "success",
        buttonsStyling: true,
        confirmButtonText: "Ok",
    });
        });
    </script>
    <?php endif; ?>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include 'navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include 'sidebar.php' ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">


            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Details</h4>
                      <p class="card-description">
                        Basic form layout
                      </p>
                      <?php if ($errMsg != ''): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $errMsg; ?>
                                        </div>
                                    <?php endif; ?>
                      <form method="POST" class="forms-sample">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                          <label for="name">Full Name</label>
                          <input type="text" value="<?php echo $name; ?>" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                          <label for="mobile" class="form-label">Mobile No</label>
                          <input type="text" class="form-control" value="<?php echo $mobile_number; ?>" id="number" name="mobile_number">
                        </div>
                        <div class="form-group">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" class="form-control" value="<?php echo $email; ?>" id="email" name="email">
                        </div>

                        <div class="form-group">
                          <label for="gender" class="form-label">Gender</label><br>
                          <select id="gender" class="form-control form-control-lg" name="gender" required>
                            <option value="" disabled>Select Gender</option>
                            <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                            <option value="Others" <?php echo ($gender == 'Others') ? 'selected' : ''; ?>>Others</option>
                          </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Clear</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. Donate Life <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
        <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span> -->
      </div>
      <!-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
        </div> -->
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../dash_resource/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../dash_resource/vendors/chart.js/Chart.min.js"></script>
  <script src="../dash_resource/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../dash_resource/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../dash_resource/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../dash_resource/js/off-canvas.js"></script>
  <script src="../dash_resource/js/hoverable-collapse.js"></script>
  <script src="../dash_resource/js/template.js"></script>
  <script src="../dash_resource/js/settings.js"></script>
  <script src="../dash_resource/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../dash_resource/js/dashboard.js"></script>
  <script src="../dash_resource/js/Chart.roundedBarCharts.js"></script>
  <script src="../dash_resource/js/sweetalert.js"></script>

  <!-- End custom js for this page-->
</body>

</html>