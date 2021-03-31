<?php
include("fun.php");
function add()
{
    if (empty($_POST['title'])) {
        $GLOBALS['error_message'] = '請輸入title';
        return;
    }
    if (empty($_POST['type'])) {
        $GLOBALS['error_message'] = '請輸入type';
        return;
    }
    if (empty($_POST['year'])) {
        $GLOBALS['error_message'] = '請輸入year';
        return;
    }
    if (empty($_POST['volumn'])) {
        $GLOBALS['error_message'] = '請輸入volumn';
        return;
    }
    if (empty($_POST['page'])) {
        $GLOBALS['error_message'] = '請輸入page';
        return;
    }
    if (empty($_POST['first_name'])) {
        $GLOBALS['error_message'] = 'first_name';
        return;
    }

    if (empty($_POST['last_name'])) {
        $GLOBALS['error_message'] = 'last_name';
        return;
    }
    $title = $_POST['title'];
    $type = $_POST['type'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $volumn = $_POST['volumn'];
    $issue = $_POST['issue'];
    $page = $_POST['page'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $journal_title = $_POST['journal_title'];
    $isEI = $_POST['isEI'];
    $isSCI = $_POST['isSCI'];
    $country = $_POST['country'];

    if ($isSCI == NULL) {
        $isSCI = 0;
    }
    if ($isEI == NULL) {
        $isEI = 0;
    }

    include('mysql_connect.php');
    $sql_publication = "insert into `publication` values (null,'{$title}',
    {$type},'{$year}','{$volumn}','{$month}','{$issue}','{$page}');";
    $query_publication = mysqli_query($conn, $sql_publication);
    var_dump($query_publication);

    $sql_author = "insert into `Author` values (null,'{$first_name}',
    '{$last_name}'
);";
    $query_author = mysqli_query($conn, $sql_author);
    var_dump($query_author);

    $sql_journal = "insert into `Journal` values (null,'{$journal_title}',
    {$isSCI},{$isEI},'{$country}'
);";
    $query_journal = mysqli_query($conn, $sql_journal);
    var_dump($query_journal);
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
                    <h2 style="text-align: center;">新增</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <h3>publication</h3>
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="name" name="title" class="form-control" id="title" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="type">type</label>
                            <input type="name" name="type" class="form-control" id="type" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="year">year</label>
                            <input type="tel" name="year" class="form-control" id="year" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="month">month</label>
                            <input type="tel" name="month" class="form-control" id="month" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="volumn">volumn</label>
                            <input type="tel" name="volumn" class="form-control" id="volumn" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="issue">issue</label>
                            <input type="tel" name="issue" class="form-control" id="issue" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="page">page</label>
                            <input type="tel" name="page" class="form-control" id="page" aria-describedby="emailHelp" name="office_phone">
                        </div>
                        <h3>author</h3>
                        <div class="form-group">
                            <label for="first_name">first_name</label>
                            <input type="tel" name="first_name" class="form-control" id="first_name" aria-describedby="emailHelp" name="office_phone">
                        </div>
                        <div class="form-group">
                            <label for="last_name">last_name</label>
                            <input type="tel" name="last_name" class="form-control" id="last_name" aria-describedby="emailHelp" name="office_phone">
                        </div>
                        <h3>journal</h3>
                        <div class="form-group">
                            <label for="journal_title">journal_title</label>
                            <input type="tel" name="journal_title" class="form-control" id="journal_title" aria-describedby="emailHelp">
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckIndeterminate" name="isSCI">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                isSCI
                            </label>
                        </div>
                        <div class="form-check my-1">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckIndeterminate" name="isEI">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                isEI
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="country">country</label>
                            <input type="name" name="country" class="form-control" id="country" aria-describedby="emailHelp" name="country">
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