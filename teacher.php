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
        <div class="col-8 text-center">
          <h3>周永振 (Yung-Chen Chou) </h3>
          <h3>亞洲大學 資訊工程學系 多媒體安全實驗室</h3>
          <h3>研究領域: 數位浮水印, 資訊隱藏, 影像擷取, 資訊安全</h3>
          <h3>聯絡電話: +886-4-23323456 ext.48005</h3>
          <h4>傳真: 04-2330-5737</h4>
          <h4>電子郵件信箱: yungchen@gmail.com </h4>
          <h3>郵寄地址: 台中市霧峰區柳豐路500號</h3>

        </div>
        <div class="col-4">
          <img src="https://fakeimg.pl/250x300/">
        </div>
      </div>
    </div>
  <?php endif ?>




  <?php footer(); ?>






  <?php script(); ?>
</body>

</html>