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
            <section class="dis-flex wid-100 pad-10">
                <div class="" id="profile-overview">
                    <div id="profile-image">
                        <img src="<?= $user->image ?>" alt="user-image-3">
                        <h5 class="txt-w-bold"><?= esc(ucfirst($user->fname))." ".$user->lname ?></h5>
                        <h5><?= $user->email ?></h5>
                        <?php if($user->verified): ?>
                            <p>Verified User</p>
                        <?php else: ?>
                            <div>
                                <a href="profile/verify">
                                    <button class="btn-lay-2 btn-anima-hover">Verify Account</button>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div id="profile-general">
                        <div>
                            <h3>Name</h3>
                            <p><?= esc($user->fname." ".$user->lname) ?></p>
                        </div>
                        <div>
                            <h3>Email</h3>
                            <p><?= esc($user->email) ?></p>
                        </div>
                        <div>
                            <h3>NIC Number</h3>
                            <p><?= esc($user->city) ?></p>
                        </div>
                        <div>
                            <h3>Contact Number</h3>
                            <p><?= esc($user->contact_num) ?></p>
                        </div>
                        <div>
                            <h3>City</h3>
                            <p><?= esc($user->city) ?></p>
                        </div>
                        <div>
                            <h3>District</h3>
                            <p><?= esc($user->district) ?></p>
                        </div>
                        <div>
                            <h3>Address 01</h3>
                            <p><?= esc($user->address1) ?></p>
                        </div>
                        <div>
                            <h3>Services</h3>
                            <p><?= esc($user->address2) ?></p>
                        </div>
                    </div>

                    <div id="profile-usertype">
                        Singer Special
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>