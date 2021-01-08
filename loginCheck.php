<?php

$userID = mysqli_real_escape_string($link, $_POST['username']);
$passPW = mysqli_real_escape_string($link, $POST['password']);


echo $sql;

$result = mysqli_query($link, $sql);
$val = $result->num_rows;
echo '$val<br/>';

if ($val == 1) {
    $_SESSION['userID'] = $userID;
    header("Location :mainPage.php");
} else {
    header("Location: index.html");
}
