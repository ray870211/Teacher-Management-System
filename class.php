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
    <div class="row">
      <table>
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">禮拜一</th>
              <th scope="col">禮拜二</th>
              <th scope="col">禮拜三</th>
              <th scope="col">禮拜四</th>
              <th scope="col">禮拜五</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">08:00~10:00</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">08:00~10:00<< /th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">08:00~10:00<< /th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">08:00~10:00<< /th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">08:00~10:00<< /th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </table>
    </div>
  </div>

  <?php footer(); ?>




  <?php script(); ?>

</body>

</html>