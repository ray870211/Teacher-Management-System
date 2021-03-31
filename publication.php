<?php
session_start();
include("fun.php");
include('mysql_connect.php');
if (isset($_SESSION['email'])) {

    $sql = "SELECT * FROM publication";
    $result = mysqli_query($conn, $sql);
?>

    <!doctype html>
    <html lang="en">

    <?php html_head(); ?>


    <body>
        <?php navBar(); ?>



        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="Journal-tab" data-bs-toggle="tab" href="#Journal" role="tab" aria-controls="home" aria-selected="true">Journal(期刊)</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="Conference-tab" data-bs-toggle="tab" href="#Conference" role="tab" aria-controls="Conference" aria-selected="false">Conference(研討會)</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="Book_Chapter-tab" data-bs-toggle="tab" href="#Book_Chapter" role="tab" aria-controls="Book_Chapter" aria-selected="false">Book Chapter(專書論文)</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="Other-tab" data-bs-toggle="tab" href="#Other" role="tab" aria-controls="Other" aria-selected="false">Other(其他)</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <!--Journal-->
                        <div class="tab-pane active" id="Journal" role="tabpanel" aria-labelledby="Journal-tab">
                            <div class="row" style="margin: 3px 0;">
                                <div class="col-6">
                                    <a href="addJournal_paper.php" class="btn btn-primary">新增</a>
                                </div>
                                <div class="col-6">
                                    <form action="search_paper.php" method="post">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Paper">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <ol>
                                <?php
                                $i = 1;
                                while ($pubRow = mysqli_fetch_assoc($result)) {
                                    echo "<li style='font-size:1.3em;padding-bottom:0.3em;";
                                    if ($i % 2 == 1) {
                                        echo "background-color:#cceeff;";
                                    }
                                    echo "'>";
                                    $aithorQuery = "SELECT * FROM `pub-author` CROSS JOIN `author` on `pub-author`.
                                    `author_id`=`author`.`id` WHERE `pub-author`.`pub_id` = " . $pubRow[`id`] . "ORDER BY `pub-author`.`author_order`";
                                    $authorResult = mysqli_query($conn, $authorQuery);
                                    while ($authorRow = mysqli_fetch_assoc($authorResult)) {
                                        echo $authorRow['last_name'] . "," . $authorRow['first_name'];
                                        if ($authorRow['isCorresponding'] == 1) {
                                            echo "*, ";
                                        } else {
                                            echo ", ";
                                        }
                                    }
                                    echo "(" . $pubRow['year'] . "),\"" . $pubRow['title'] . ",\" ";
                                    if ($pubRow['pub_id'] == 1) {
                                        $journalQuery = "SELECT * FROM `journal` WHERE `id` =" . $pubRow['pub_id'];
                                        $journalResult = mysqli_query($conn, $journalQuery);
                                        $journalRow = mysqli_fetch_assoc($journalResult);
                                        echo "<i>" . $journalRow['title'] . "</i>,";
                                    }
                                    if ($pubRow['volume'] != NULL) {
                                        echo "Vol." . $pubRow['volume'] . ",";
                                    }
                                    if ($pubRow['issue'] != NULL) {
                                        echo "No." . $pubRow['issue'] . ",";
                                    }
                                    if ($pubRow['month'] != NULL) {
                                        echo $pubRow['month'] . ",";
                                    }
                                    echo $pubRow['year'] . ", pp." . $pubRow['pages'] . ".";
                                    echo "<form style='display:inline;' onsubmit=\"return confirm('Do you really want to delete this paper?');\">
                                    <input type='hidden' name='userID' value='" . $pubRow['id'] . "' />
                                    <input type='image' src='images\delete.png' style = 'width:1.2em;' />
                                    </form>";
                                    echo "<form style='display:inline;'>
                                    <input type = 'hidden' name='userID' value='" . $pubRow['id'] . "'/>
                                    <input type = 'image' src='images\modify.png' style='width:1.2em' />
                                    </form>";
                                    echo "</li>";
                                }
                                ?>
                            </ol>
                        </div>
                        <!--End Journal-->
                        <div class="tab-pane" id="Conference" role="tabpanel" aria-labelledby="Conference-tab">
                            <div class="row" style="margin:3px 0;">
                                <div class="col-10"></div>
                                <div class="col-2" style="text-align: right;"><a href="addUser.php" class="btn btn-primary">新增</a></div>
                            </div>
                        </div>

                        <div class="tab-pane" id="Book_Chapter" role="tabpanel" aria-labelledby="Book_Chapter-tab">...</div>
                        <div class="tab-pane" id="Other" role="tabpanel" aria-labelledby="Other-tab">...</div>
                    </div>
                </div>
            </div>
        </div>

        <?php footer(); ?>



        <?php script(); ?>
    </body>

    </html>
<?php
} else {
    echo '<h1>請先登入帳號</h1>';
}
