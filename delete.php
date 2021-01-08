<?php
if (empty($_GET['id'])) {
  exit('<h1>請傳入</h1>');
}
$id = $_GET['id'];
include("mysql_connect.php");
// $name = $_POST['name'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $phone = $_POST['phone'];
// $type = (int)$_POST['job'];
// $state = 1;
// $create_time = date("Y-m-d H:i:s",mktime (date(H)+8, date(i), date(s), date(m), date(d), date(Y)));


$sql = "delete FROM `user` where `id`={$id};";
$query = mysqli_query($conn, $sql);

if (!$query) {
  exit('<h1>查詢失敗</h1>');
}

mysqli_close($connection);

header('Location: users.php');
