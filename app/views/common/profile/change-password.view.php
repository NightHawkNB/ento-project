<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="cols-10 profile bg-primary dis-flex al-it-st">
                <div class="profile-container-2 change-pass">
                    <form method="post" class="wid-50">

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

                        <div class="wid-100 dis-flex ju-co-ce">
                            <button type="submit" class="btn-lay-2 btn-anima-hover">Save changes</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
</html>