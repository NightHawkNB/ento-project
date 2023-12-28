<html lang="en">
<?php $this->view('includes/head', ['style' => 'auth/signup.css']) ?>
<body>
    <div class="auth-overlay"></div>
    <div class="dis-flex ju-co-ce al-it-ce pad-20 wid-100">

        <?php if(message()): ?>
            <div class="alert-msg cols-12"><?= message('', true); ?></div>
        <?php else: ?>
            <div></div>
        <?php endif; ?>

        <main class="signup-container auth-container sh">
            <div class="login left-section">
                <form method="POST">
                    <h2>Register</h2>
                    <fieldset>
                        <legend>Personal Details</legend>
                        <div class="group">
                            <div class="input-box <?= (!empty($errors['fname'])) ? 'error' : '' ?>">
                                <label for="fname">First Name</label>
                                <input value="<?php set_value('fname') ?>" type="text" name="fname" required>
                                <i></i>
                            </div>
                            <div class="input-box <?= (!empty($errors['lname'])) ? 'error' : '' ?>">
                                <label for="lname">Last Name</label>
                                <input value="<?php set_value('lname') ?>" type="text" name="lname" required>
                                <i></i>
                            </div>
                        </div>
                        <div class="input-box <?= (!empty($errors['contact_num'])) ? 'error' : '' ?>">
                            <label for="contact_num">Contact Number</label>
                            <input value="<?php set_value('district') ?>" type="text" name="contact_num" maxlength="10" required>
                            <i></i>
                        </div>
                        <div class="group <?= (!empty($errors['address01'])) ? 'error' : '' ?>">
                            <div class="input-box">
                                <label for="address1">Address line 01</label>
                                <input value="<?php set_value('address1') ?>" type="text" name="address1" required>
                                <i></i>
                            </div>
                            <div class="input-box <?= (!empty($errors['address2'])) ? 'error' : '' ?>">
                                <label for="address2">Address line 02</label>
                                <input value="<?php set_value('address2') ?>" type="text" name="address2" required>
                                <i></i>
                            </div>
                        </div>
                        <div class="group">
                            <div class="input-box <?= (!empty($errors['city'])) ? 'error' : '' ?>">
                                <label for="city">City</label>
                                <input value="<?php set_value('city') ?>" type="text" name="city" required>
                                <i></i>
                            </div>
                            <div class="input-box <?= (!empty($errors['district'])) ? 'error' : '' ?>">
                                <label for="district">District</label>
                                <input value="<?php set_value('district') ?>" type="text" name="district" required>
                                <i></i>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Account Details</legend>
                        <div class="input-box <?= (!empty($errors['email'])) ? 'error' : '' ?>">
                            <label for="email">Email</label>
                            <input value="<?php set_value('email') ?>" type="email" name="email" required>
                            <i></i>
                        </div>
                        <div  class="group">
                            <div class="input-box <?= (!empty($errors['password'])) ? 'error' : '' ?>">
                                <label for="password">Password</label>
                                <input value="<?php set_value('password') ?>" type="password" name="password" required>
                                <i></i>
                            </div>
                            <div class="input-box <?= (!empty($errors['confirmPass'])) ? 'error' : '' ?>">
                                <label for="confirmPass">Confirm Password</label>
                                <input value="<?php set_value('confirmPass') ?>" type="password" name="confirmPass" required>
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

<!--                    <fieldset id="singer">-->
<!--                        <legend>Singer Special</legend>-->
<!--                        <div class="group">-->
<!--                            <div class="input-box --><?php //= (!empty($errors['something1'])) ? 'error' : '' ?><!--">-->
<!--                                <input value="--><?php //set_value('something1') ?><!--" type="text" name="something1">-->
<!--                                <label for="something1">Something1</label>-->
<!--                                <i></i>-->
<!--                            </div>-->
<!--                            <div class="input-box --><?php //= (!empty($errors['something2'])) ? 'error' : '' ?><!--">-->
<!--                                <input value="--><?php //set_value('something2') ?><!--" type="text" name="something2">-->
<!--                                <label for="something2">Something2</label>-->
<!--                                <i></i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </fieldset>-->

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

            <div class="login right-section">
                <img src="<?= ROOT ?>/assets/images/icons/signup.jpg" alt="signup">
            </div>
        </main>

    </div>
</body>

</html>