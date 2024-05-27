<?php
include("../include/config.php");
include("checkLogin.php");

if (isset($_POST['submit']) && isset($_FILES['req_form'])) {
    $errMsg = '';
    $name = $_POST['name'];
    $number = $_POST['mobile'];
    $dob = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $location = $_POST['location'];
    $weight = $_POST['weight'];
    $landmarks = $_POST['landmarks'];
    $req_form = $_FILES['req_form']['name'];
    $req_form_tmp = $_FILES['req_form']['tmp_name'];

    if ($req_form != "") {
        $uploadDir = "../admin/images/";
        $uploadFilePath = $uploadDir . basename($req_form);

        if (move_uploaded_file($req_form_tmp, $uploadFilePath)) {
            $query = "SELECT * FROM blood_req WHERE mobile_number = '$number'";
            $result = mysqli_query($conn, $query);
            $count_number = mysqli_num_rows($result);

            if ($count_number == 0) {
                $query = "INSERT INTO blood_req(name, mobile_number, blood_group, birth_date, gender, weight, location, landmarks, req_form_path) 
                          VALUES ('$name', '$number', '$blood_group', '$dob', '$gender', '$weight', '$location', '$landmarks', '$uploadFilePath')";

                $stmt = $conn->prepare($query);
                $result = $stmt->execute();
                if ($result) {
                    echo '<script>alert("Request Successful!");</script>';
                } else {
                    echo '<script>alert("Request Failed!");</script>';
                }
            } else {
                echo '<script>alert("Already Requested!");</script>';
            }
        } else {
            echo '<script>alert("Failed to upload file.");</script>';
        }
    } else {
        echo '<script>alert("Request Failed!");</script>';
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

    <style>
        .popup {
            display: none;
            position: fixed;
            z-index: 9999;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .popup-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        .close {
            color: #fff;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 30px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                               
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Blood Request Form</h4>
                                                <form method="POST" enctype="multipart/form-data" class="forms-sample">
                                                    <div class="form-group">
                                                        <label for="name" class="form-label">Full Name</label>
                                                        <input type="text" class="form-control" id="name" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mobile" class="form-label">Mobile No</label>
                                                        <input type="text" class="form-control" id="mobile" name="mobile">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="birth_date" class="form-label">Date Of Birth</label>
                                                        <input type="date" class="form-control" id="birth_date" name="birth_date">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label><br>
                                                        <select id="gender" class="form-control form-control-lg" name="gender" required>
                                                            <option value="" disabled selected>Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="blood_group">Blood Group</label><br>
                                                        <select id="blood_group" class="form-control form-control-lg" name="blood_group" required>
                                                            <option value="" disabled selected>Select Blood Group</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="location" class="form-label">Location</label>
                                                        <input type="text" class="form-control" id="location" name="location">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="weight" class="form-label">Weight</label>
                                                        <input type="text" class="form-control" id="weight" name="weight">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="landmarks" class="form-label">Landmarks</label>
                                                        <input type="text" class="form-control" id="landmarks" name="landmarks">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="req_form" class="form-label">Requisition form (रक्त निवेदन फारम )</label>
                                                        <input type="file" class="form-control" id="req_form" name="req_form" accept=".jpg, .jpeg, .png" required>
                                                    </div>
                                                    <a href="#" id="openPopup">Here is a sample of Blood requisition form</a>
                                                    <div class="popup" id="popup">
                                                        <span class="close" onclick="closePopup()">&times;</span>
                                                        <img class="popup-content" src="../assets/images/blood-request-form.jpg" alt="Blood requisition form">
                                                    </div><br>
                                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                </form>
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
    <script>
        // Function to open the popup
        function openPopup() {
            document.getElementById("popup").style.display = "block";
        }

        // Function to close the popup
        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Event listener to trigger the popup on click
            document.getElementById("openPopup").addEventListener("click", function(event) {
                event.preventDefault(); // Prevent the default behavior of the link
                openPopup(); // Call the function to open the popup
            });

            // Event listener to close the popup when the close button is clicked
            document.querySelector(".close").addEventListener("click", function(event) {
                event.preventDefault(); // Prevent the default behavior of the link
                closePopup(); // Call the function to close the popup
            });
        });
    </script>
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


    <!-- End custom js for this page-->
</body>

</html>