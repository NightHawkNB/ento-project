<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
                <?php $this->view('common/sidebar'); ?>
            </section>
            <section class="cols-10 dis-flex flex-wrap pad-10 gap-20">

                <div class="dis-flex-col bg-white pad-10-20 bor-rad-5 al-it-ce sh">
                    <img src="<?= ROOT ?>/assets/images/users/user_03.jpg" alt="user-image-3" class="profile-image">
                    <h2 class="f-poppins mar-10"><?= esc($user->fname)." ".esc($user->lname) ?></h2>
                    <h4 class="txt-c-cornflowerblue mar-0 f-space-1"><?= esc(ucfirst($user->user_type)) ?></h4>
                    <h4 class="txt-w-normal"><?= esc($user->email) ?></h4>
                    <button class="btn-lay-2"><a href="profile/verify">Verify Account</a></button>
                </div>

                <div class="dis-flex-col bg-white pad-10-20 bor-rad-5 al-it-ce sh profile-details">
                    <div class="wid-100">
                        <div class="dis-grid-c3">
                            <h3>Name</h3>
                            <p class="cols-2"><?= esc($user->fname." ".$user->lname) ?></p>
                        </div>
                        <hr>
                        <div class="dis-grid-c3">
                            <h3>Email</h3>
                            <p class="cols-2"><?= esc($user->email) ?></p>
                        </div>
                        <hr>
                        <div class="dis-grid-c3">
                            <h3>Phone</h3>
                            <p class="cols-2"><?= esc($user->contact_num) ?></p>
                        </div>
                        <hr>
                        <div class="dis-grid-c3">
                            <h3>Address</h3>
                            <p class="cols-2">Colmbo 10</p>
                        </div>
                        <hr>
                        <div class="dis-grid-c3">
                            <h3>Services</h3>
                            <p class="cols-2">Colmbo 10</p>
                        </div>
                    </div>
                </div>
                <!-- IMPORTANT https://mdbootstrap.com/docs/standard/extended/profiles/#section-3 -->

<!--                <div class="profile-container">-->
<!--                    <div class="avatar">-->
<!--                        <img src="http://media.idownloadblog.com/wp-content/uploads/2012/04/Phil-Schiller-headshot-e1362692403868.jpg" height="150" width="150">-->
<!--                    </div>-->
<!---->
<!--                    <h2>--><?php //= esc($user->fname) . " " .esc($user->lname) ?><!--</h2>-->
<!--                    <h4>--><?php //= esc($user->email) ?><!--</h4>-->
<!--                    <h4>--><?php //= esc($user->user_type) ?><!--</h4>-->
<!---->
<!--                    <p>Details About the User - About</p>-->
<!---->
<!--                    -->
<!--                </div>-->
                <div class="dis-flex-col bg-white pad-10-20 bor-rad-5 al-it-ce sh">
                    <?php $this->view(strtolower($_SESSION['USER_DATA']->user_type)."/profile", (array)$user) ?>
                </div>
            </section>
        </main>
        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>