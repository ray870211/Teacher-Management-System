<?php
session_start();
include("fun.php");
function login()
{

    if (empty($_POST['name'])) {
        $GLOBALS['error_message'] = '請輸入姓名';
        return;
    }
    if (empty($_POST['email'])) {
        $GLOBALS['error_message'] = '請輸入信箱';
        return;
    }
    if (empty($_POST['password'])) {
        $GLOBALS['error_message'] = '請輸入密碼';
        return;
    }
    if (empty($_POST['phone'])) {
        $GLOBALS['error_message'] = '請輸入電話';
        return;
    }
    if (empty($_POST['job']) && $_POST['job'] == 0) {
        $GLOBALS['error_message'] = '請選擇身分';
        return;
    }

    $conn = mysqli_connect("210.70.80.21", "k107021250", "yai3ubae", "k107021250");
    if (!$conn) {
        exit('<h1>失敗</h1>');
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $type = (int)$_POST['job'];
    $state = 1;
    // $create_time = date("Y-m-d H:i:s",mktime (date(H)+8, date(i), date(s), date(m), date(d), date(Y)));



    $sql = "insert into `user` values (null, '{$name}', '{$password}', '{$email}', '{$phone}',{$type},{$state},NOW(),0);";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        exit('<h1>查詢失敗</h1>');
    }
    $addected_rows = mysqli_affected_rows($conn);

    if ($addected_rows !== 1) {
        $GLOBALS['error_message'] = '添加數據失敗';
        return;
    }
    $_SESSION['email'] = $email;
    $_SESSION['type'] = $type;
    header('location:index.php');
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    login();
}
?>
<!doctype html>
<html lang="en">

<?php html_head(); ?>


<body>
    <?php navBar(); ?>

    <div class="container" style="height: 100vh;">

        <div class="login1" style="padding-top: 50px;">
            <h2 style="text-align: center;">註冊系統</h2>
            <form action="logup.php" method="POST">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="phone" name="phone" class="form-control" id="phone" aria-describedby="emailHelp">

                </div>
                <select name="job" class="custom-select" id="inputGroupSelect01">
                    <option selected value="0">選擇職業</option>
                    <option value="1">學生</option>
                    <option value="2">教師</option>
                </select>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                <button type="submit" class="btn btn-primary mt-3">返回登入</button>
            </form>

            <?php if (isset($error_message)) : ?>
                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                    <strong>警告</strong> <?php echo $error_message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        </div>
    </div>











    <?php script(); ?>
</body>

</html>