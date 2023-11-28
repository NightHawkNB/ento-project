<html lang="en">
<?php $this->view('includes/head') ?>

<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>

            <section class="cols-2">
            <div class="cols-10 dis-flex">
                <div class="bg-black-2 mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content:stretch; align-items:stretch">

                    <form method="POST" class="dis-flex-col al-it-ce gap-20">
                        <h2>Register</h2>
                        <fieldset class="wid-60 pad-20 bor-rad-5 dis-flex-col gap-10">
                            <legend>Personal Details</legend>
                            <div class="dis-flex mar-top-0 gap-20">
                                <div class="dis-flex-col <?= (!empty($errors['fname'])) ? 'error' : '' ?>">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" class="input" required>
                                    <i></i>
                                </div>
                                <div class="dis-flex-col <?= (!empty($errors['lname'])) ? 'error' : '' ?>">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" class="input" required>
                                    <i></i>
                                </div>
                            </div>
                            <div class="dis-flex-col <?= (!empty($errors['contact_num'])) ? 'error' : '' ?>">
                                <label for="contact_num">Contact Number</label>
                                <input type="text" name="contact_num" maxlength="10" class="input" required>
                                <i></i>
                            </div>
                            <div class="dis-flex gap-20">
                                <div class="dis-flex-col <?= (!empty($errors['city'])) ? 'error' : '' ?>">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="input" required>
                                    <i></i>
                                </div>
                                <div class="dis-flex-col <?= (!empty($errors['district'])) ? 'error' : '' ?>">
                                    <label for="district">District</label>
                                    <input type="text" name="district" class="input" required>
                                    <i></i>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="wid-60 pad-20 bor-rad-5 dis-flex-col gap-10">
                            <legend>Account Details</legend>
                            <div class="dis-flex-col <?= (!empty($errors['email'])) ? 'error' : '' ?>">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="input" required>
                                <i></i>
                            </div>

                                <input type="checkbox" class="hide" name="change_pass" id="change_pass" checked>

                            <div class="dis-flex gap-20">
                                <div class="dis-flex-col <?= (!empty($errors['password'])) ? 'error' : '' ?>">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="input" required>
                                    <i></i>
                                </div>
                                <div class="dis-flex-col <?= (!empty($errors['confirmPass'])) ? 'error' : '' ?>">
                                    <label for="confirmPass">Confirm Password</label>
                                    <input type="password" name="confirmPass" class="input" required>
                                    <i></i>
                                </div>
                            </div>
                        </fieldset>

                    <button type="submit" class="btn-lay-2 hover-pointer btn-anima-hover">Add user</button>
                </form>
            </div>
            </section>
        </main>
    </div>
</body>

</html>