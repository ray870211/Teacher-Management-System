<div class="header">
    <div class="nav_bg bg-light">
        <nav class="navbar navbar-light bg-light justify-content-center">
            <i class="fas fa-book-reader m-2"></i>
            <span class="navbar-brand mb-0 h1">Ray網頁</span>
            <i class="fas fa-home"></i>
            <a href="index.php" class="m-2 text-white bg-dark">Home</a>
            <a href="class.php" class="m-2 text-dark">課表</a>
            <a href="teacher.php" class="m-2 text-dark">教師</a>
            <a href="" class="m-2 text-dark">簡歷</a>
            <a href="publication.php" class="m-2 text-dark">著作</a>
            <a href="" class="m-2 text-dark">教學</a>
            <a href="" class="m-2 text-dark">徒弟</a>
            <a href="" class="m-2 text-dark">常用連結</a>
            <?php if (empty($_SESSION)) : ?>
                <a href="login.php" class="m-2 text-dark">登入/註冊</a>
            <?php endif ?>
            <?php if (isset($_SESSION['email'])) : ?>
                <a href="#" class="m-2 text-dark"><?php echo $email; ?></a>
                <a href="logout.php" class="m-2 text-dark"><?php echo '登出'; ?></a>
            <?php endif ?>
            <?php if ($_SESSION['type'] == 2) : ?>
                <a href="users.php" class="m-2 text-dark">編輯</a>
            <?php endif ?>
        </nav>
    </div>
</div>