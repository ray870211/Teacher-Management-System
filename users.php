<?php
session_start();
include("fun.php");
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
}
if (isset($_SESSION['type'])) {
  $type = $_SESSION['type'];
}
include("mysql_connect.php");
$sql = "select * from `user`;";
$query = mysqli_query($conn, $sql);

if (!$query) {
  exit('<h1>查詢失敗</h1>');
}



?>

<!doctype html>
<html lang="en">

<?php html_head(); ?>


<body>
  <?php navBar(); ?>

  <div class="container justify-conten-center">
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered table-dark">
          <thead>
            <tr>
              <td>id</td>
              <td>name</td>
              <td>email</td>
              <td>password</td>
              <td>phone</td>
              <td>type</td>
              <td>state</td>
              <td>create-time</td>
              <td>update-time</td>
              <td>編輯</td>
              <td>刪除</td>
            </tr>
          </thead>
          <tbody>
            <?php while ($item = mysqli_fetch_assoc($query)) : ?>
              <tr>
                <th><?php echo $item['id']; ?></th>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['password']; ?></td>
                <td><?php echo $item['phone']; ?></td>
                <td><?php echo $item['type']; ?></td>
                <td><?php echo $item['state']; ?></td>
                <td><?php echo $item['create-time']; ?></td>
                <td><?php echo $item['update-time']; ?></td>
                <td><a href="edit.php?id=<?php echo $item['id']; ?>">編輯</a></td>
                <td><a href="delete.php?id=<?php echo $item['id']; ?>">刪除</a></td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>



  <?php footer(); ?>




  <?php script(); ?>
</body>

</html>