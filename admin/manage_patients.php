<?php

include("../include/config.php");
include("checkLogin.php");

// if (isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] === true) {
//   header('Location: login.php');
//   exit;
// }



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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manage Patients</h4>
                  <!-- <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Name</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">email</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Mobile</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Gender</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Action</h6>
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $sql = "select * from patient_reg";
                        $result = $conn->query($sql);
                        if (!$result) {
                          die("Invalid Query");
                        }
                        while ($row = $result->fetch_assoc()) {


                          echo "
<tr>
                      <td>$row[id]</td>
                      <td>$row[full_name]</td>
                      <td>$row[email]</td>
                      <td>$row[mobile_number]</td>
                      <td>$row[gender]</td>
                      <td>
                      <a class = 'btn btn-success' href='update_patient.php?id=$row[id]'>Edit</a>
                      <a class = 'btn btn-danger' onclick='confirmDelete($row[id])'>Delete</a>

                      </td>
                      </tr>
                      ";
                        }
                        ?>
                      </tbody>
                    </table>
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
      <script src="../dash_resource/js/Chart.roundedBarCharts.js"></script>
      <script src="../dash_resource/js/sweetalert.js"></script>
      <script src="../dash_resource/js/sweetalert1.js"></script>
      <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


      <script>
      function confirmDelete(id) {
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            // window.location.href = 'delete_patient.php?id=$row[id]';
            window.location.href = 'delete_patient.php?id=' +id;

          } else {
           swal({
          text: "Your data is safe!",
          icon: "success",
          confirmButtonText: 'OK'
 }
            );
          }
       
        });
      }
    </script>
      <!-- End custom js for this page-->
</body>

</html>