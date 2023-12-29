<html lang="en">
<?php $this->view('includes/head', ['style' => 'auth/signup.css']) ?>
<script src="<?= ROOT ?>/assets/scripts/components/locations.js" defer></script>
<body>
    <div class="auth-overlay"></div>
    <div class="dis-flex ju-co-ce al-it-ce pad-20 wid-100">

        <?php
        if(!empty($_SESSION['user_data'])) {
            $_POST = $_SESSION['user_data'];
            unset($_SESSION['user_data']);
        }

        if(message()) {
            switch ($_SESSION['alert-status']) {
                case 'neutral':
                    $status = "neutral";
                    $heading = "Alert";
                    break;
                case 'success':
                    $status = "success";
                    $heading = "Success";
                    break;
                case 'failed':
                    $status = "failed";
                    $heading = "Error";
                    break;
                default :
                    $status = "";
                    $heading = "";
            }
        }
        ?>

        <!-- START OF Popup message box -->
        <div class="alert <?= $status ?> dis-flex gap-10 al-it-ce <?= (message()) ? 'show' : '' ?>" id="alert-window">
            <?php if($status == "success"): ?>
                <svg class="feather feather-check-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <?php endif; ?>
            <?php if($status == "neutral"): ?>
                <svg class="feather feather-alert-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
            <?php endif; ?>
            <?php if($status == "failed"): ?>
                <svg class="feather feather-x-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
            <?php endif; ?>

            <p class="flex-1">
                <?= $heading ?> : <?= message('', true); ?>
            </p>
        </div>
        <!-- END OF Popup message box -->

        <main class="signup-container auth-container sh">
            <div class="login left-section">
                <form method="POST">
                    <h2>Register</h2>

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
                    <div class="group">
                        <div class="input-box <?= (!empty($errors['email'])) ? 'error' : '' ?>">
                            <label for="email">Email</label>
                            <input value="<?php set_value('email') ?>" type="email" name="email" required>
                            <i></i>
                        </div>
                        <div class="input-box <?= (!empty($errors['contact_num'])) ? 'error' : '' ?>">
                            <label for="contact_num">Contact Number</label>
                            <input value="<?php set_value('district') ?>" type="text" name="contact_num" maxlength="10" required>
                            <i></i>
                        </div>
                    </div>

                    <div class="group">
                        <div class="input-box <?= (!empty($errors['province'])) ? 'error' : '' ?>">
                            <label for="province">Province</label>
                            <select name="province" id="province" class="input" onchange="updateDistrict()">
                                <option value="central">Central</option>
                                <option value="eastern">Eastern</option>
                                <option value="northCentral">North Central</option>
                                <option value="northern">Northern</option>
                                <option value="northWestern">North Western</option>
                                <option value="sabaragamuwa">Sabaragamuwa</option>
                                <option value="southern">Southern</option>
                                <option value="uva">Uva</option>
                                <option value="western">Western</option>
                            </select>
                            <i></i>
                        </div>
                        <div class="input-box <?= (!empty($errors['district'])) ? 'error' : '' ?>">
                            <label for="district">District</label>
                            <select name="district" class="input" id="district"></select>
                            <i></i>
                        </div>
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
                        <select value="<?php set_value('user_type') ?>" name="user_type" id="user_type" onchange="view_box()">
                            <option value="" selected disabled>Account Type</option>
                            <option value="client">Client</option>
                            <option value="singer">Singer</option>
                            <option value="band">Band</option>
                            <option value="venuemanager">Venue Manager</option>
                        </select>
                        <i></i>
                    </div>

                    <div id="singer-box" class="user_type_box input-box <?= (!empty($errors['rate'])) ? 'error' : '' ?>">
                        <label for="rate">Rate</label>
                        <input value="<?php set_value('rate') ?>" type="text" name="rate">
                        <i></i>
                    </div>

                    <div id="band-box" class="user_type_box group">
                        <div class="input-box <?= (!empty($errors['packages'])) ? 'error' : '' ?>">
                            <label for="packages">Packages</label>
                            <input value="<?php set_value('packages') ?>" type="text" name="packages">
                            <i></i>
                        </div>
                        <div class="input-box <?= (!empty($errors['location'])) ? 'error' : '' ?>">
                            <label for="location">Location</label>
                            <input value="<?php set_value('location') ?>" type="text" name="location">
                            <i></i>
                        </div>
                    </div>

                    <div class="terms-div">
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
                    <button type="submit">Next</button>
                </form>
            </div>

            <div class="login right-section">
                <img id="signup-right-image" src="<?= ROOT ?>/assets/images/icons/auth/signup.jpg" alt="signup">
            </div>
        </main>

        <script>
            const user_type = document.getElementById('user_type')
            const singer_box = document.getElementById('singer-box')
            const band_box = document.getElementById('band-box')
            const side_image = document.getElementById('signup-right-image')

            function view_box() {
                let type = user_type.value

                if(type === "singer") {
                    if(!singer_box.classList.contains('selected')) singer_box.classList.add('selected')
                    side_image.src = "<?= ROOT ?>/assets/images/icons/auth/singer.jpg"
                } else if(type === "band") {
                    if(!band_box.classList.contains('selected')) band_box.classList.add('selected')
                    side_image.src = "<?= ROOT ?>/assets/images/icons/auth/band.jpg"
                } else {
                    if(singer_box.classList.contains('selected')) singer_box.classList.remove('selected')
                    if(band_box.classList.contains('selected')) band_box.classList.remove('selected')
                    side_image.src = "<?= ROOT ?>/assets/images/icons/auth/signup.jpg"
                }
            }
        </script>

    </div>
</body>

</html>