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
            <section class="cols-10 profile">
                <div class="profile-container-2 change-pass">
                    <form method="post">

                        <h2 style="color: black;">Change your Password</h2>

                        <div class="profile-input">
                            <label for="inputPasswordCurrent">Current password</label>
                            <input type="password" class="form-control" id="inputPasswordCurrent">
                        </div>
                        <div class="profile-input">
                            <label for="inputPasswordNew">New password</label>
                            <input type="password" class="form-control" id="inputPasswordNew">
                        </div>
                        <div class="profile-input">
                            <label for="inputPasswordNew2">Verify password</label>
                            <input type="password" class="form-control" id="inputPasswordNew2">
                        </div>
                        <button type="submit" class="btn-lay-2 btn-anima-hover">Save changes</button>
                    </form>
                </div>
            </section>
        </main>
        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>