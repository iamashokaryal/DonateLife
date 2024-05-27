<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Red Stream - connect the donors</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!--css-->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="dash_resource/css/vertical-layout-light/sweetalert.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>



</head>

<body id="top">
  <!-- HEADER-->
  <header class="header">
    <div class="header-top">
      <div class="container">
        <ul class="contact-list">
          <li class="contact-item">
            <ion-icon name="mail-outline"></ion-icon>
            <a href="mailto:donatelife@gmail.com" class="contact-link">donatelife@gmail.com</a>
          </li>
          <li class="contact-item">
            <ion-icon name="call-outline"></ion-icon>
            <a href="tel:+977-9863442248" class="contact-link">+977-9863442248</a>
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
    <div class="header-bottom" data-header>
  <div class="container">
    <a href="#" class="logo">Donate Life</a>
    <nav class="navbar container" data-navbar>
      <ul class="navbar-list">
        <li>
          <a href="index.php" class="navbar-link" data-nav-link>Home</a>
        </li>
        <li>
          <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
        </li>
        <li>
          <a href="about.php" class="navbar-link" data-nav-link>About</a>
        </li>

        <li>
          <a href="contact.php" class="navbar-link" data-nav-link>Contact</a>
        </li>
        <li>
          <a href="admin/login.php" class="navbar-link" data-nav-link>Admin</a>
        </li>
        <li>
          <a href="donor/register.php" class="button button-primary"  >Donate Blood</a>
        <button class="nav-toggle-button" aria-label="Toggle menu" data-nav-toggler>
          </button>
          </li>
          <li>
          <a href="patient/register.php" class="button button-primary"  >Request Blood</a>
        <button class="nav-toggle-button" aria-label="Toggle menu" data-nav-toggler>
          </button>
          
      </ul>
    </nav>
  </div>

</div>

  </header>

  <main>
    <article>
      <!--HERO-->
      <section class="section service" id="service" aria-label="service">
        <div class="container">
          <p class="section-subtitle text-center">Find the best Donor For You</p>
          <h2 class="h2 section-title text-center">FIND DONOR</h2>

          <!-- Replace the existing content with your form -->
          <form class="donor-form" method="post" action="">
            

          

            <div class="form-group">
              <label for="blood-type">Blood Type:</label>
              <select id="blood-type" name="blood-type">
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
              <label for="city">City:</label>
              <input type="text" id="city" name="city" required>
            </div>

            <button type="submit" class="btn">Find Donor</button>
          </form>
          <?php
          define('dbhost','localhost');
          define('dbuser','root');
          define('dbpass','');
          define('dbname','donate_life');
          
          try{
              $conn = new mysqli(dbhost,dbuser,dbpass,dbname);
              // $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
              // $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
          }
          catch(PDOException $e)
          {
              echo $e->getMessage();
          }
          
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $blood_group = $_POST["blood-type"];
  $city = $_POST["city"];
          $sql = "SELECT COUNT(*) AS count FROM donor_reg WHERE blood_group = ? AND city = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $blood_group, $city);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $count = $row['count'];

        
            echo "<script>
            Swal.fire({
              title: ' " . $count . " " . $blood_group . " blood group donor is available to donate in this city!',
              text: 'Register to request for blood donations.',
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

            $stmt->close();
            $conn->close();
}
          ?>


        </div>
      </section>


      <!--FOOTER-->
      <?php include 'footer.php'; ?>

      <!--BACK TO TOP-->
      <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="caret-up" aria-hidden="true"></ion-icon>
      </a>

      <!--custom js link-->
      <script src="./assets/js/script.js" defer></script>
      <!--ionicon link-->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <script src="dash_resource/js/sweetalert.js"></script>
</body>

</html>