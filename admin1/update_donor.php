<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("../include/config.php");

$errMsg = '';
$id = "";
$name = "";
$mobile_number = "";
$email = "";
$gender = "";
$blood_group ="";
$weight ="";
$state ="";
$district ="";
$zip_code ="";
$area ="";
$landmarks ="";
if ($_SERVER["REQUEST_METHOD"] == 'GET') {

    if (!isset($_GET['id'])) {
        header("Location: dashboard.php");
        exit();
    }
    $id = $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $sql = $conn->prepare("SELECT * FROM donor_reg WHERE id = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: dashboard.php");
        exit;
    }

    $name = $row["full_name"];
    $mobile_number = $row["mobile_number"];
    $email = $row["email"];
    $gender = $row["gender"];
    $blood_group = $row["blood_group"];
    $weight = $row["weight"];
    $state = $row["state"];
    $district = $row["district"];
    $zip_code = $row["zip_code"];
    $area = $row["area"];
    $landmarks = $row["landmarks"];
    


}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
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
    <?php include 'sidebar.php'; ?>

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
                  <img src="./assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
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
                            <h5 class="card-title fw-semibold mb-4">Update Donor Details</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" value="<?php echo $name; ?>" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Mobile No</label>
                                            <input type="text" class="form-control" value="<?php echo $mobile_number; ?>" id="number" name="Mobile_number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" value="<?php echo $email; ?>" id="email" name="email">
                                        </div>

                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label><br>
                                            <select id="gender" name="gender" required>
                                                <option value="" disabled>Select Gender</option>
                                                <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                                                <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                                                <option value="Others" <?php echo ($gender == 'Others') ? 'selected' : ''; ?>>Others</option>
                                            </select>
                                        </div>
      
                                      
                <div class="mb-3">
                  <label for="blood-group"class="form-label">BLOOD GROUP</label><br>
                  <select id="blood-group" name="blood_group" required>
                    <option value="" disabled selected>Select Blood Group</option>
                    <option value="A+" <?php echo ($blood_group == 'A+') ? 'selected' : ''; ?> >A+</option>
                    <option value="A-" <?php echo ($blood_group == 'A-') ? 'selected' : ''; ?>  >A-</option>
                    <option value="B+" <?php echo ($blood_group == 'B+') ? 'selected' : ''; ?>  >B+</option>
                    <option value="B-" <?php echo ($blood_group == 'B-') ? 'selected' : ''; ?>  >B-</option>
                    <option value="AB+" <?php echo ($blood_group == 'AB+') ? 'selected' : ''; ?>  >AB+</option>
                    <option value="AB-"<?php echo ($blood_group == 'AB-') ? 'selected' : ''; ?>  >AB-</option>
                    <option value="O+"<?php echo ($blood_group == 'O+') ? 'selected' : ''; ?>  >O+</option>
                    <option value="O-" <?php echo ($blood_group == 'O-') ? 'selected' : ''; ?> >O-</option>
                  </select>
                </div>
                                        <div class="mb-3">
                                            <label for="weight" class="form-label">Weight</label>
                                            <input type="text" class="form-control" value="<?php echo $weight; ?>" id="weight" name="weight">
                                        </div>
                                        <div class="mb-3">
                                            <label for="state" class="form-label">State</label>
                                            <input type="text" class="form-control" value="<?php echo $state; ?>" id="state" name="state">
                                        </div>
                                        <div class="mb-3">
                                            <label for="district" class="form-label">District</label>
                                            <input type="text" class="form-control" value="<?php echo $district; ?>" id="district" name="district">
                                        </div>
                                        <div class="mb-3">
                                            <label for="zip_code" class="form-label">Zip Code</label>
                                            <input type="text" class="form-control" value="<?php echo $zip_code; ?>" id="zip_code" name="zip_code">
                                        </div>
                                        <div class="mb-3">
                                            <label for="area" class="form-label">Area</label>
                                            <input type="text" class="form-control" value="<?php echo $area; ?>" id="area" name="area">
                                        </div>
                                        <div class="mb-3">
                                            <label for="landmarks" class="form-label">Landmarks</label>
                                            <input type="text" class="form-control" value="<?php echo $landmarks; ?>" id="landmarks" name="landmarks">
                                        </div>
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
        </div>
    </div>
</body>

</html>
