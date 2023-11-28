<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper auth-page">

        <?php if(message()): ?>
            <div class="alert-msg cols-12"><?= message('', true); ?></div>
        <?php else: ?>
            <div></div>
        <?php endif; ?>

        <div class="dis-flex-col al-it-ce ju-co-ce cols-12 bg-black-2">
            <div class="bg-trans pad-20 bor-rad-5 dis-flex-col">
                <div class="login-form signup-form">
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
                                    <option value="client">Client</option>
                                    <option value="singer">Singer</option>
                                    <option value="band">Band</option>
                                    <option value="venuemanager">Venue Manager</option>
                                </select>
                                <i></i>
                            </div>
                        </fieldset>

                        <fieldset id="singer">
                            <legend>Singer Special</legend>
                            <div class="dis-flex gap-20">
                                <div class="input-box <?= (!empty($errors['something1'])) ? 'error' : '' ?>">
                                    <input value="<?php set_value('something1') ?>" type="text" name="something1">
                                    <label for="something1">Something1</label>
                                    <i></i>
                                </div>
                                <div class="input-box <?= (!empty($errors['something2'])) ? 'error' : '' ?>">
                                    <input value="<?php set_value('something2') ?>" type="text" name="something2">
                                    <label for="something2">Something2</label>
                                    <i></i>
                                </div>
                            </div>
                        </fieldset>

                        <div class="text-center">
                            <input <?= set_value('terms') ? 'checked' : '' ?> type="checkbox" name="terms" id="terms" required>
                            <label for="terms">
                                <a href="#terms">Terms and Conditions</a>
                            </label>
                        </div>
                        <?php if(!empty($errors['terms'])):?>
                            <div class="error-msg text-center"><?= $errors['terms'] ?></div>
                        <?php else: ?>
                             <div class="text-center"></div>
                        <?php endif; ?>
                        <p class="">Already have an Account ? <a href="<?= ROOT ?>/login">Login</a></p>
                        <button type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>