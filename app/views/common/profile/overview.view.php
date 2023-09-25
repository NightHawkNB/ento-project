<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
                <?php $this->view(strtolower($_SESSION['USER_DATA']->user_type).'/sidebar'); ?>
            </section>
            <section class="cols-10 profile">
                <div class="profile-container">
                    <div class="avatar">
                        <img src="http://media.idownloadblog.com/wp-content/uploads/2012/04/Phil-Schiller-headshot-e1362692403868.jpg" height="150" width="150">
                    </div>

                    <h2><?= esc($user->fname) . " " .esc($user->lname) ?></h2>
                    <h4><?= esc($user->email) ?></h4>
                    <h4><?= esc($user->user_type) ?></h4>

                    <p>Details About the User - About</p>

                    <button class="btn-lay-2"><a href="profile/verify">Verify Account</a></button>
                </div>
                <div class="profile-container">
                    <?php $this->view(strtolower($_SESSION['USER_DATA']->user_type)."/profile", (array)$user) ?>
                </div>
            </section>
        </main>
        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>