
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donate Life</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">

  <!--css-->
  <link rel="stylesheet" href="../assets/css/style.css">

  <!-- google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../dash_resource/css/vertical-layout-light/sweetalert.css">
  <script src="../dash_resource/js/sweetalert.js"></script>
  <style>
    /* Form Styles */
    .form-title {
      color: var(--oxford-blue-1);
      font-family: var(--ff-poppins);
      font-size: 3.4rem;
      font-weight: var(--fw-800);
      text-align: center;
      margin-bottom: 20px;
    }

    .form-section {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .form-field {
      flex: 0 0 48%;
      margin-bottom: 20px;
    }

    .form-field label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-field input,
    .form-field select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-field input[type="submit"] {
      background-color: #216aca;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .form-field input[type="submit"]:hover {
      background-color: #060952;
    }
  </style>

</head>

<body id="top">
  <!-- HEADER-->
  <header class="header">
    <div class="header-top">
      <div class="container">
        <ul class="contact-list">
          <li class="contact-item">
            <ion-icon name="mail-outline"></ion-icon>
            <a href="mailto:redstream001@gmail.com" class="contact-link">redstream001@gmail.com</a>
          </li>
          <li class="contact-item">
            <ion-icon name="call-outline"></ion-icon>
            <a href="tel:+9779863442248" class="contact-link">+977-9863442248</a>
          </li>
        </ul>
        <ul class="social-list">
          <li>
            <a href="https://www.facebook.com/andro.pool.54?mibextid=ZbWKwL" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/_vladimir_putin.___/" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li>
            <a href="https://twitter.com/Annabel07785340" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>
          <li>
            <a href="https://youtu.be/Af0gk_kiGac" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <?php include '../navbar.php'; ?>
   
  </header>

  <main>
    <article>
      <section class="section hero" id="home" style="background-image: url('../assets/images/hero-bg.png'); margin: 0%;" aria-label="hero">
        <!-- Login and Registration Form -->
        <div class="container">
          <div class="form-container">
            <div class="form-title">Donor Registration</div>
            <form action="#" method="POST">
              <!-- Login Information -->
              <div class="form-section">
                <div class="form-field">
                  <label for="full-name">FULL NAME</label>
                  <input type="text" id="full-name" name="full_name" placeholder="Your Full name" required>
                </div>
                <div class="form-field">
                  <label for="mobile">MOBILE NUMBER</label>
                  <input type="text" id="mobile" name="mobile_number" placeholder="Your contact number" required>
                </div>
                <div class="form-field">
                  <label for="email">EMAIL</label>
                  <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-field">
                  <label for="password">PASSWORD</label>
                  <input type="password" id="password" name="password" required>
                </div>
              </div>
              <!-- Donor Information -->
              <div class="form-section">
                <div class="form-field">
                  <label for="blood-group">BLOOD GROUP</label>
                  <select id="blood-group" name="blood_group" required>
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
                <div class="form-field">
                  <label for="birth-date">BIRTH DATE</label>
                  <input type="date" id="birth-date" name="birth_date" required>
                </div>
                <div class="form-field">
                  <label for="gender">GENDER</label>
                  <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="form-field">
                  <label for="weight">WEIGHT</label>
                  <input type="text" id="weight" name="weight" placeholder="Enter in KG" required>
                </div>
              </div>
              <!-- Contact Information -->
              <div class="form-section">
                
                <div class="form-field">
                  <label for="district">DISTRICT</label>
                  <input type="text" id="district" name="district" required>
                </div>
                <div class="form-field">
                  <label for="city">CITY</label>
                  <input type="text" id="city" name="city" required>
                </div>
                <div class="form-field">
                  <label for="zip-code">ZIP CODE</label>
                  <input type="text" id="zip-code" name="zip_code" required>
                </div>
                <div class="form-field">
                  <label for="area">AREA</label>
                  <input type="text" id="area" name="area" required>
                </div>
              </div>
              <div class="form-field">
                <label for="area">Landmarks</label>
                <input type="text" id="landmarks" name="landmarks" required>
              </div>

              <button type="submit" name="register" class="btn">Register</button>
            </form>
            <div class="form-title">Already Registered? <u><a href="login.php" style="display: inline; color: #216aca;" onmouseover="this.style.color='#03d9ff'" onmouseout="this.style.color='#216aca'">Login Here</a></u></div>
          </div>
          <figure class="hero-banner">
            <img src="../assets/images/bg.svg" width="587" height="839" alt="hero banner" class="w-100">
            <center>
              <h2>New Here ?</h2>
            </center>
          </figure>
        </div>
      </section>

      <!--FOOTER-->
      <?php include '../footer.php';?>      <!--BACK TO TOP-->
      <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="caret-up" aria-hidden="true"></ion-icon>
      </a>

      <!--custom js link-->
      <script src="../assets/js/script.js" defer></script>
      <!--ionicon link-->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
<?php

require_once("../include/config.php");

if (isset($_POST['register'])) {
  $errMsg = '';
  $name = $_POST['full_name'];
  $number = $_POST['mobile_number'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $blood_group = $_POST['blood_group'];
  $dob = $_POST['birth_date'];
  $gender = $_POST['gender'];
  $weight = $_POST['weight'];
  $city = $_POST['city'];
  $district = $_POST['district'];
  $zip_code = $_POST['zip_code'];
  $area = $_POST['area'];
  $landmarks = $_POST['landmarks'];

  $query = "select * from donor_reg where email ='$email'";
  $result = mysqli_query($conn, $query);
  $count_email = mysqli_num_rows($result);

  $query = "select * from donor_reg where mobile_number ='$number'";
  $result = mysqli_query($conn, $query);
  $count_number = mysqli_num_rows($result);

  if ($count_email == 0 || $count_number == 0) {
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $query = "insert into donor_reg(full_name,mobile_number,email,password,blood_group,birth_date,gender,weight,district,city,zip_code,area,landmarks) 
    values('$name', '$number', '$email', '$hash', '$blood_group', '$dob', '$gender', '$weight', '$district','$city', '$zip_code', '$area', '$landmarks')";
    $result = mysqli_query($conn, $query);
    if ($result) {
      echo "<script>
            Swal.fire({
              title: ' Registered Successfully',
              icon: 'success',
              showClass: {
                popup: `
                  animate__animated
                  animate__fadeInUp
                  animate__faster
                `
              },
              hideClass: {
                popup: `
                  animate__animated
                  animate__fadeOutDown
                  animate__faster
                `
              }
            });
          </script>";
    } else {
      echo '<script>alert("Registration Failed!");</script>';
      echo "<script>
            Swal.fire({
              title: ' Registration Failed!',
              icon: 'error',
              showClass: {
                popup: `
                  animate__animated
                  animate__fadeInUp
                  animate__faster
                `
              },
              hideClass: {
                popup: `
                  animate__animated
                  animate__fadeOutDown
                  animate__faster
                `
              }
            });
          </script>";
  }
} else {
  echo "<script>
            Swal.fire({
              title: ' User already exists!',
              
              icon: 'success',
              showClass: {
                popup: `
                  animate__animated
                  animate__fadeInUp
                  animate__faster
                `
              },
              hideClass: {
                popup: `
                  animate__animated
                  animate__fadeOutDown
                  animate__faster
                `
              }
            });
          </script>";
}
}


?>
