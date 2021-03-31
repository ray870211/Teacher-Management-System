<?php
include("fun.php");
function add()
{
    if (empty($_POST['name_c'])) {
        $GLOBALS['error_message'] = '請輸入中文姓名';
        return;
    }
    if (empty($_POST['name_e'])) {
        $GLOBALS['error_message'] = '請輸入英文姓名';
        return;
    }
    if (empty($_POST['phone'])) {
        $GLOBALS['error_message'] = '請輸入手機';
        return;
    }
    if (empty($_POST['office_phone'])) {
        $GLOBALS['error_message'] = '請輸入電話';
        return;
    }
    if (empty($_POST['work_email'])) {
        $GLOBALS['error_message'] = '請輸入信箱';
        return;
    }
    if (empty($_POST['department_c'])) {
        $GLOBALS['error_message'] = '請輸入department_c';
        return;
    }

    if (empty($_POST['department_e'])) {
        $GLOBALS['error_message'] = '請輸入department_e';
        return;
    }
    $name_c = $_POST['name_c'];
    $name_e = $_POST['name_e'];
    $phone = $_POST['phone'];
    $is_show_phone = $_POST['is_show_phone'];
    $office_phone = $_POST['office_phone'];
    $is_show_office_phone = $_POST['is_show_office_phone'];
    $fax = $_POST['fax'];
    $work_email = $_POST['work_email'];
    $home_email = $_POST['home_email'];
    $room_no = $_POST['room_no'];
    $is_show_room_no = $_POST['is_show_room_no'];
    $department_c = $_POST['department_c'];
    $department_e = $_POST['department_e'];
    $research_c = $_POST['research_c'];
    $research_e = $_POST['research_e'];
    $post_address_c = $_POST['post_address_c'];
    $post_address_e = $_POST['post_address_e'];
    $file_name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]); //取得照片的位置
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //strtolower轉小寫,pathinfo() 函數以數組的形式返回文件路徑的信息。
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    if ($is_show_phone == NULL) {
        $is_show_phone = 0;
    }
    if ($is_show_office_phone == NULL) {
        $is_show_office_phone = 0;
    }
    if ($is_show_room_no == NULL) {
        $is_show_room_no = 0;
    }

    if (in_array($imageFileType, $extensions_arr)) {
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        include('mysql_connect.php');
        $sql = "insert into `teacher` values (null,'{$name_c}',
    '{$name_e}','{$phone}',{$is_show_phone},'{$office_phone}',{$is_show_office_phone},'{$fax}',
    '{$work_email}','{$home_email}','{$room_no}',{$is_show_room_no},'{$department_c}',
    '{$department_e}','{$research_c}','{$research_e}','{$post_address_c}',
    '{$post_address_e}','{$image}',null,NOW()
);";
        $query = mysqli_query($conn, $sql);
        var_dump($query);
        $row = mysqli_fetch_assoc($query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $file_name); //檔案放到資料夾裡面
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    add();
}
?>
<!doctype html>
<html lang="en">

<?php html_head() ?>


<body>

    <div class="container">
        <div class="row g-3">
            <div class="col">
                <div class="login1" style="padding-top: 50px;">
                    <h2 style="text-align: center;">新增教師</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name_c">姓名</label>
                            <input type="name" name="name_c" class="form-control" id="name_c" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="name_e">英文姓名</label>
                            <input type="name" name="name_e" class="form-control" id="name_e" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="phone">手機</label>
                            <input type="tel" name="phone" class="form-control" id="phone" aria-describedby="emailHelp">
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckIndeterminate" name="is_show_phone">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                是否顯示在頁面上
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="office_phone">辦公室電話</label>
                            <input type="tel" name="office_phone" class="form-control" id="office_phone" aria-describedby="emailHelp" name="office_phone">
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckIndeterminate" name="is_show_office_phone">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                是否顯示在頁面上
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="fax">傳真</label>
                            <input type="tel" name="fax" class="form-control" id="fax" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="work_email">work_email</label>
                            <input type="email" name="work_email" class="form-control" id="work_email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="home_email">home_email</label>
                            <input type="email" name="home_email" class="form-control" id="home_email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="room_no">room_no</label>
                            <input type="name" name="room_no" class="form-control" id="work_email" aria-describedby="emailHelp" name="room_no">
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckIndeterminate" name="is_show_room_no">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                是否顯示在頁面上
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="department_c">department_c</label>
                            <input type="name" name="department_c" class="form-control" id="department_c" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="department_e">department_e</label>
                            <input type="name" name="department_e" class="form-control" id="department_e">
                        </div>
                        <div class="form-group">
                            <label for="research_c">research_c</label>
                            <input type="name" name="research_c" class="form-control" id="research_c" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="research_e">research_e</label>
                            <input type="name" name="research_e" class="form-control" id="research_e" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="post_address_c">post_address_c</label>
                            <input type="name" name="post_address_c" class="form-control" id="post_address_c" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="post_address_e">post_address_e</label>
                            <input type="name" name="post_address_e" class="form-control" id="post_address_e" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="file">image</label>
                            <input type="file" name="file" class="form-control" id="fille" aria-describedby="emailHelp">
                        </div>
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

        </div>
    </div>
    <?php script(); ?>
</body>

</html>