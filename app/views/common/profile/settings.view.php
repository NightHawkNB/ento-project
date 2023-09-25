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
                <div class="profile-container-2 dis-flex-col gap-10 profile-settings">
                    <h2 style="color: black;">Change Notification Preferences</h2>

                    <form method="post" class="dis-flex-col al-it-ce gap-20">
                        <div class="dis-flex gap-10">
                            <label for="setting-1" style="text-align: center">Event Notifications</label>
                            <label class="switch">
                                <input type="checkbox" name="setting-1">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="dis-flex gap-10">
                            <label for="setting-2" style="text-align: center">Request Notifications</label>
                            <label class="switch">
                                <input type="checkbox" name="setting-2">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="dis-flex gap-10">
                            <label for="setting-3" style="text-align: center">Reservation Reminders</label>
                            <label class="switch">
                                <input type="checkbox" name="setting-3">
                                <span class="slider round"></span>
                            </label>
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