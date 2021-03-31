<?php
session_start();
include("fun.php");
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
}
if (isset($_SESSION['type'])) {
  $type = $_SESSION['type'];
}
include('mysql_connect.php');
$sql = "select * FROM `teacher` ;";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$sql = "select image from teacher where id={$row['id']}";
$result = mysqli_query($conn, $sql);
$item = mysqli_fetch_array($result);
$image_src2 = $item['image'];
?>

<!doctype html>
<html lang="en">

<?php html_head(); ?>

<body>
  <?php navBar(); ?>

  <?php if (!$row) : ?>
    <div class="container">
      <div class="row">
        <div class="col py-5">
          <a href="add_teacher.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">新增教師</a>
        </div>
      </div>
      <div class="row py-5">
        <div class="col">
          <div class="alert alert-danger" role="alert">
            無教師資料，請新增
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
  <?php if ($row) : ?>
    <div class="container my-2">
      <div class="row mt-5">
        <div class="col-8 text-center text">
          <h2><?php echo $row['name_c'] . "(" . $row['name_e'] . ")"; ?> </h2>
          <h3>亞洲大學 <?php echo $row['department_c']; ?></h3>
          <h3>研究領域: <?php echo $row['research_c'] ?></h3>
          <h3>傳真: <?php echo $row['fax']; ?></h3>
          <?php if ($row['is_show_cell_phone'] == 1) {
            echo "<h3>連絡電話:" .  $row['cell_phone'] . "</h3>";
          } ?>
          <?php if ($row['is_show_office_phone'] == 1) {
            echo "<h3>辦公室電話:" .  $row['office_phone'] . "</h3>";
          } ?>
          <?php if ($row['is_show_room_no'] == 1) : ?>
            <h3>辦公室:<?php echo $row['room_no']; ?></h3>
          <?php endif ?>
          <h3>電子郵件信箱:<?php echo $row['email_work']; ?></h3>
          <h3>郵寄地址: <?php echo $row['post_address_c']; ?></h3>
        </div>
        <div class="col-4">
          <img src="<?php echo $image_src2; ?>" style="height:400px">
        </div>
      </div>
    </div>
  <?php endif ?>

  <a href="add_teacher.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">新增教師</a>



  <?php footer(); ?>






  <?php script(); ?>
</body>

</html>