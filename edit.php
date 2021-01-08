<?php
include("fun.php");
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


$sql = "select * FROM `user` where `id`={$id};";
$query = mysqli_query($conn, $sql);

if (!$query) {
    exit('<h1>查詢失敗</h1>');
}

$item = mysqli_fetch_assoc($query);
mysqli_close($connection);



function edit()
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
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $type = (int)$_POST['job'];
    $state = 1;
    $today = date("Y-m-d H:i:s");
    // $create_time = date("Y-m-d H:i:s",mktime (date(H)+8, date(i), date(s), date(m), date(d), date(Y)));
    include("mysql_connect.php");

    $sql = "UPDATE `user` set `name`='{$name}',`password`={$password},`email`='{$email}',`phone`={$phone},`type`={$type},`update-time`=NOW() where id ={$id}; ";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        exit('<h1>查詢失敗</h1>');
    }
    header('Location: users.php');
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    edit();
}
?>
<!doctype html>
<html lang="en">
<?php html_head(); ?>


<body>


    <div class="container" style="height: 100vh;">
        <div class="login1" style="padding-top: 50px;">
            <h2 style="text-align: center;">編輯<?php echo $item['name']; ?></h2>
            <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="POST">
                <div class="form-group">
                    <label for="id">id</label>
                    <input type="id" name="id" class="form-control" id="id" aria-describedby="emailHelp" value="<?php echo $_GET['id']; ?>">
                </div>
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="<?php echo $item['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $item['email']; ?>">

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="<?php echo $item['password']; ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="phone" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" value="<?php echo $item['phone']; ?>">

                </div>
                <select name="job" class="custom-select" id="inputGroupSelect01">
                    <option selected value="0">選擇職業</option>
                    <option value="1" <?php echo $item['type'] === '1' ? 'selected' : '' ?>>學生</option>
                    <option value="2" <?php echo $item['type'] === '2' ? 'selected' : '' ?>>教師</option>
                </select>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>

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