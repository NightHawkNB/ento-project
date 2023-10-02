<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>

            <section class="cols-10 dis-flex">
                <div class="bg-black-2 mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content:stretch; align-items:stretch">
                    
                <form method="POST" class="pos-abs dis-flex-col al-it-ce gap-20">
                        <h2>Register</h2>
                        <fieldset>
                            <legend>Personal Details</legend>
                            <div class="dis-flex input-box mar-top-0 gap-20">
                                <div class="input-box <?= (!empty($errors['fname'])) ? 'error' : '' ?>">
                                    <input value="<?php set_value('fname') ?>" type="text" name="fname" required>
                                    <label for="fname">First Name</label>
                                    <i></i>
                                </div>
                                <div class="input-box <?= (!empty($errors['lname'])) ? 'error' : '' ?>">
                                    <input value="<?php set_value('lname') ?>" type="text" name="lname" required>
                                    <label for="lname">Last Name</label>
                                    <i></i>
                                </div>
                            </div>
                            <div class="input-box <?= (!empty($errors['contact_num'])) ? 'error' : '' ?>">
                                <input value="<?php set_value('district') ?>" type="text" name="contact_num" maxlength="10" required>
                                <label for="contact_num">Contact Number</label>
                                <i></i>
                            </div>
                            <div class="dis-flex-col input-box gap-20">
                                <div class="dis-flex gap-20 <?= (!empty($errors['address01'])) ? 'error' : '' ?>">
                                    <div class="input-box">
                                        <input value="<?php set_value('address1') ?>" type="text" name="address1" required>
                                        <label for="address1">Address line 01</label>
                                        <i></i>
                                    </div>
                                    <div class="input-box <?= (!empty($errors['address2'])) ? 'error' : '' ?>">
                                        <input value="<?php set_value('address2') ?>" type="text" name="address2" required>
                                        <label for="address2">Address line 02</label>
                                        <i></i>
                                    </div>
                                </div>
                                <div class="dis-flex gap-20">
                                    <div class="input-box <?= (!empty($errors['city'])) ? 'error' : '' ?>">
                                        <input value="<?php set_value('city') ?>" type="text" name="city" required>
                                        <label for="city">City</label>
                                        <i></i>
                                    </div>
                                    <div class="input-box <?= (!empty($errors['district'])) ? 'error' : '' ?>">
                                        <input value="<?php set_value('district') ?>" type="text" name="district" required>
                                        <label for="district">District</label>
                                        <i></i>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Account Details</legend>
                            <div class="input-box <?= (!empty($errors['email'])) ? 'error' : '' ?>">
                                <input value="<?php set_value('email') ?>" type="email" name="email" required>
                                <label for="email">Email</label>
                                <i></i>
                            </div>
                            <div  class="dis-flex gap-20">
                                <div class="input-box <?= (!empty($errors['password'])) ? 'error' : '' ?>">
                                    <input value="<?php set_value('password') ?>" type="password" name="password" required>
                                    <label for="password">Password</label>
                                    <i></i>
                                </div>
                                <div class="input-box <?= (!empty($errors['confirmPass'])) ? 'error' : '' ?>">
                                    <input value="<?php set_value('confirmPass') ?>" type="password" name="confirmPass" required>
                                    <label for="confirmPass">Confirm Password</label>
                                    <i></i>
                                </div>
                            </div>
                            <div class="input-box <?= (!empty($errors['user_type'])) ? 'error' : '' ?>">
                                <select value="<?php set_value('user_type') ?>" name="user_type" id="user_type" onchange="changeForm()">
                                    <option value="" selected disabled>Account Type</option>
                                    <option value="singer">Singer</option>
                                    <option value="band">Band</option>
                                    <option value="venuem">Venue Manager</option>
                                    <option value="cca">CCA</option>
                                </select>
                                <i></i>
                            </div>
                        </fieldset>

                        <button type="submit">Add New</button>
                    </form>   
                    
                
                </div >
            </section>
        </main>
    </div>
</body>
</html>