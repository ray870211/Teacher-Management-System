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
              <th scope="row">08:00~09:00</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">09:00~10:00</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>資料庫整合應用開發</td>
            </tr>
            <tr>
              <th scope="row">10:00~11:00</th>
              <td></td>
              <td> </td>
              <td></td>
              <td></td>
              <td>資料庫整合應用開發</td>
            </tr>
            <tr>
              <th scope="row">11:00~12:00</th>
              <td></td>
              <td> </td>
              <td></td>
              <td></td>
              <td>資料庫整合應用開發</td>
            </tr>
            <tr>
              <th scope="row">12:00~13:00</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">13:00~14:00</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">14:00~15:00</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">15:00~16:00</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">16:00~17:00</th>
              <td></td>
              <td></td>
              <td></td>
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