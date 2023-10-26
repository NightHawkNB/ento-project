<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <style>
            #info-table div {
                display: flex;
                gap: 10px;
            }

            #info-table div > h3 {
                min-width: 30%;
            }

            #info-table div > p {
                max-width: 70%;
            }

            button {
                padding-right: 20px;
            }
        </style>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="cols-10 dis-flex-col flex-wrap pad-10 gap-20 bg-lightgray">
                <a class="push-right" href="profile/verify">
                    <button class="btn-lay-2 btn-anima-hover txt-c-black">Verify Account</button>
                </a>
                <div class="dis-flex ju-co-ce gap-20 wid-100">
                    <div class="dis-flex-col bg-white pad-10-20 bor-rad-5 al-it-ce sh profile-details wid-50">
                        <img src="<?= ROOT ?>/assets/images/users/<?= $user->image ?>" alt="user-image-3" class="profile-image">
                        <h2 class="f-poppins mar-10"><?= ucfirst(esc($user->fname))." ".esc($user->lname) ?></h2>
                        <div class="wid-100 dis-flex-col gap-10 pad-20" id="info-table">
                            <div class="">
                                <h3>Name</h3>
                                <p class="cols-2"><?= esc($user->fname." ".$user->lname) ?></p>
                            </div>
                            <div class="dis-grid-c3">
                                <h3>Email</h3>
                                <p class="cols-2"><?= esc($user->email) ?></p>
                            </div>
                            <div class="dis-grid-c3">
                                <h3>NIC Number</h3>
                                <p class="cols-2"><?= esc($user->city) ?></p>
                            </div>
                            <div class="dis-grid-c3">
                                <h3>Contact Number</h3>
                                <p class="cols-2"><?= esc($user->contact_num) ?></p>
                            </div>
                            <div class="dis-grid-c3">
                                <h3>City</h3>
                                <p class="cols-2"><?= esc($user->city) ?></p>
                            </div>
                            <div class="dis-grid-c3">
                                <h3>District</h3>
                                <p class="cols-2"><?= esc($user->district) ?></p>
                            </div>
                            <div class="dis-grid-c3">
                                <h3>Address 01</h3>
                                <p class="cols-2"><?= esc($user->address1) ?></p>
                            </div>
                            <div class="dis-grid-c3">
                                <h3>Services</h3>
                                <p class="cols-2"><?= esc($user->address2) ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="dis-flex-col bg-white pad-10-20 bor-rad-5 al-it-ce sh">
                        <?php $this->view(strtolower($_SESSION['USER_DATA']->user_type)."/profile", (array)$user) ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>