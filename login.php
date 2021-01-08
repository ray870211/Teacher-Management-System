<?php
session_start();
include("fun.php");
function login()
{
    if (empty($_POST['email'])) {
        $GLOBALS['error_message'] = '請輸入信箱';
        return;
    }
    if (empty($_POST['password'])) {
        $GLOBALS['error_message'] = '請輸入密碼';
        return;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    include("mysql_connect.php");
    $sql = "select * from user where email='$email';";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);
    $type = $row['type'];
    if ($password == $row['password']) {
        $_SESSION['email'] = $email;
        $_SESSION['type'] = $type;
        include("sendMail.php");
        header('Location:index.php');
    } else {
        $GLOBALS['error_message'] = '密碼錯誤';
        return;
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    login();
}
?>
<!doctype html>
<html lang="en">

<?php html_head(); ?>


<body>


    <div class="container" style="height: 100vh;">

        <div class="login1" style="padding-top: 50px;">
            <h2 style="text-align: center;">登入系統</h2>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    </small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a href="logup.php">註冊帳號</a>
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