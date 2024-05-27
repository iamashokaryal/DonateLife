<?php

error_reporting(0);
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
    $req_form = $_FILES["req_form"]["tmp_name"];

    if ($req_form != "") {
        move_uploaded_file($_FILES["req_form"]["tmp_name"], "images/$req_form");

        $query = "SELECT * FROM blood_req WHERE mobile_number ='$number'";
        $result = mysqli_query($conn, $query);
        $count_number = mysqli_num_rows($result);

        if ($count_number == 0) {
            $query = "INSERT INTO blood_req(name, mobile_number, blood_group, birth_date, gender, weight, location, landmarks, req_form) 
                      VALUES ('$name', '$number', '$blood_group', '$dob', '$gender', '$weight', '$location', '$landmarks', '$req_form')";

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
        echo '<script>alert("Request Failed!");</script>';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Request Form</title>
    <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
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
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="../admin/assets/images/logos/dark-logo.svg" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Features</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="request_fourm.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Request Blood</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Approved Blood Request</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Request History</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">AUTH</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-login"></i>
                                </span>
                                <span class="hide-menu">Login</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user-plus"></i>
                                </span>
                                <span class="hide-menu">Register</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../admin/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Blood Request Form</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile No</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile">
                                        </div>
                                        <div class="mb-3">
                                            <label for="birth_date" class="form-label">Date Of Birth</label>
                                            <input type="date" class="form-control" id="birth_date" name="birth_date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label><br>
                                            <select id="gender" name="gender" required>
                                                <option value="" disabled selected>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="blood_group" class="form-label">Blood Group</label><br>
                                            <select id="blood_group" name="blood_group" required>
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
                                        <div class="mb-3">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="location" name="location">
                                        </div>
                                        <div class="mb-3">
                                            <label for="weight" class="form-label">Weight</label>
                                            <input type="text" class="form-control" id="weight" name="weight">
                                        </div>
                                        <div class="mb-3">
                                            <label for="landmarks" class="form-label">Landmarks</label>
                                            <input type="text" class="form-control" id="landmarks" name="landmarks">
                                        </div>
                                        <div class="form-field">
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

            <script src="../assets/js/script.js" defer></script>
            <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
            <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../admin/assets/js/sidebarmenu.js"></script>
            <script src="../admin/assets/js/app.min.js"></script>
            <script src="../admin/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
            <script src="../admin/assets/libs/simplebar/dist/simplebar.js"></script>
            <script src="../admin/assets/js/dashboard.js"></script>

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
        </div>
    </div>
</body>
</html>
