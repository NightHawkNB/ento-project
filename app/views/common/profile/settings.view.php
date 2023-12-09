<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">

            <section class="slide-container">

                <div class="wid-100 dis-flex ju-co-ce pad-10-20 gap-20" style="background-color: rgba(147, 112, 219, 0.7)">
                    <button id="sett-btn" class="toggle-btn" onclick="slide('settings')">Settings</button>
                    <button id="pass-btn" class="toggle-btn" onclick="slide('password')">Change Password</button>
                </div>

                <div class="pages pad-10">
                    <div class="profile-container-2 glass-bg dis-flex-col gap-10 profile-settings page active" id="setting-page">
                        <h2 style="color: white">Change Notification Preferences</h2>

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
                            <button type="submit" class="glass-btn">Save changes</button>
                        </form>
                    </div>

                    <div class="profile-container-2 glass-bg txt-c-white change-pass page" id="password-page">
                        <form method="post" class="wid-50">

                            <h2>Change your Password</h2>

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
                                <button type="submit" class="glass-btn">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script defer>

                    const set_page = document.getElementById('setting-page')
                    const pas_page = document.getElementById('password-page')

                    slide = (current_page) => {
                        if(current_page === 'settings') {
                            if(!set_page.classList.contains('active')) {
                                set_page.classList.add('active')
                                pas_page.classList.remove('active')
                            }
                        } else {
                            if(!pas_page.classList.contains('active')) {
                                set_page.classList.remove('active')
                                pas_page.classList.add('active')
                            }
                        }
                    }
                </script>

            </section>
        </main>
    </div>
</body>
</html>