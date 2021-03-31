<?php
session_start();
include("fun.php");
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
}
if (isset($_SESSION['type'])) {
  $type = $_SESSION['type'];
}

?>

<!doctype html>
<html lang="en">
<?php html_head(); ?>

<body>

  <?php navBar(); ?>

  <div class="container">
    <div class="hero">
      <img src="./images/img.jpg" alt="" class="w-100">
    </div>
    <div class="row">
      <div class="col-12">


      </div>
    </div>

  </div>

  <?php footer(); ?>





  <?php script() ?>


</body>

</html>