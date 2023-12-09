<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex pad-10">
            <div class="glass-bg wid-100 dis-flex-col pad-20 gap-10 bor-rad-5">

                <form method="POST" class="dis-flex-col al-it-ce gap-20 wid-100 user-update-form">
                    <h2>Register</h2>
                    <fieldset class="pad-20 bor-rad-5 dis-flex-col gap-10">
                        <legend>Personal Details</legend>
                        <div class="input-container">
                            <div class="dis-flex-col <?= (!empty($errors['fname'])) ? 'error' : '' ?>">
                                <label for="fname">First Name</label>
                                <input value=<?= $user->fname ?> type="text" name="fname" class="input" required>
                                <i><?= (!empty($user->errors['fname'])) ? $user->errors['fname'] : '' ?></i>
                            </div>
                            <div class="dis-flex-col <?= (!empty($errors['lname'])) ? 'error' : '' ?>">
                                <label for="lname">Last Name</label>
                                <input value=<?= $user->lname ?> type="text" name="lname" class="input" required>
                                <i><?= (!empty($user->errors['lname'])) ? $user->errors['lname'] : '' ?></i>
                            </div>
                        </div>
                        <div class="dis-flex-col <?= (!empty($errors['contact_num'])) ? 'error' : '' ?>">
                            <label for="contact_num">Contact Number</label>
                            <input value=<?= $user->contact_num ?> type="text" name="contact_num" maxlength="10" class="input" required>
                            <i><?= (!empty($user->errors['contact_num'])) ? $user->errors['contact_num'] : '' ?></i>
                        </div>
                        <div class="input-container">
                            <div class="dis-flex-col <?= (!empty($errors['city'])) ? 'error' : '' ?>">
                                <label for="city">City</label>
                                <input value=<?= $user->city ?> type="text" name="city" class="input" required>
                                <i><?= (!empty($user->errors['city'])) ? $user->errors['city'] : '' ?></i>
                            </div>
                            <div class="dis-flex-col <?= (!empty($errors['district'])) ? 'error' : '' ?>">
                                <label for="district">District</label>
                                <input value=<?= $user->district ?> type="text" name="district" class="input" required>
                                <i><?= (!empty($user->errors['district'])) ? $user->errors['district'] : '' ?></i>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="pad-20 bor-rad-5 dis-flex-col gap-10">
                        <legend>Account Details</legend>
                        <div class="dis-flex-col <?= (!empty($errors['email'])) ? 'error' : '' ?>">
                            <label for="email">Email</label>
                            <input value=<?= $user->email ?> type="email" name="email" class="input" required>
                            <i><?= (!empty($user->errors['email'])) ? $user->errors['email'] : '' ?></i>
                        </div>

                        <div class="wid-100 dis-flex ju-co-ce al-it-ce">
                            <input type="checkbox" name="change_pass" id="change_pass">
                            <p>Change Password</p>
                        </div>

                        <div class="input-container">
                            <div class="dis-flex-col <?= (!empty($errors['password'])) ? 'error' : '' ?>">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="input">
                                <i><?= (!empty($user->errors['password'])) ? $user->errors['password'] : '' ?></i>
                            </div>
                            <div class="dis-flex-col <?= (!empty($errors['confirmPass'])) ? 'error' : '' ?>">
                                <label for="confirmPass">Confirm Password</label>
                                <input type="password" id="confirmPass" name="confirmPass" class="input">
                                <i><?= (!empty($user->errors['confirmPass'])) ? $user->errors['confirmPass'] : '' ?></i>
                            </div>
                        </div>
                    </fieldset>

                    <button type="submit" class="glass-btn">Update User</button>
                </form>

                <script>
                    document.getElementById('change_pass').onchange = function() {
                        // document.getElementById('password').readOnly = !this.checked;
                        // document.getElementById('confirmPass').readOnly = !this.checked;
                    };
                </script>

            </div >
        </section>
    </main>
</div>
</body>
</html>