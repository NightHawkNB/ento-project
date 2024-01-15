<html lang="en">
<?php $this->view('includes/head', ['style' => 'auth/signup.css']) ?>
<body>

<!-- Animated Background -->
<div class="area">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

<div class="dis-flex ju-co-ce al-it-ce pad-20 wid-100">

    <?php
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
                        <input value="<?= $prev->fname ?>" type="text" name="fname" required>
                        <i><?= (array_key_exists('fname', $errors)) ? $errors['fname'] : '' ?></i>
                    </div>
                    <div class="input-box <?= (!empty($errors['lname'])) ? 'error' : '' ?>">
                        <label for="lname">Last Name</label>
                        <input value="<?= $prev->lname ?>" type="text" name="lname" required>
                        <i><?= (array_key_exists('lname', $errors)) ? $errors['lname'] : '' ?></i>
                    </div>
                </div>
                <div class="group">
                    <div class="input-box <?= (!empty($errors['email'])) ? 'error' : '' ?>">
                        <label for="email">Email</label>
                        <input value="<?= $prev->email ?>" type="email" name="email" required>
                        <i><?= (array_key_exists('email', $errors)) ? $errors['email'] : '' ?></i>
                    </div>
                    <div class="input-box <?= (!empty($errors['contact_num'])) ? 'error' : '' ?>">
                        <label for="contact_num">Contact Number</label>
                        <input value="<?= $prev->contact_num ?>" type="text" name="contact_num" maxlength="10" required>
                        <i><?= (array_key_exists('contact_num', $errors)) ? $errors['contact_num'] : '' ?></i>
                    </div>
                </div>

                <div class="group">
                    <div class="input-box <?= (!empty($errors['province'])) ? 'error' : '' ?>">
                        <label for="province">Province</label>
                        <select name="province" id="province" class="input" onchange="updateDistrict()">
                            <option <?= ($prev->province == "central") ? 'selected' : '' ?> value="central">Central</option>
                            <option <?= ($prev->province == "eastern") ? 'selected' : '' ?> value="eastern">Eastern</option>
                            <option <?= ($prev->province == "northCentral") ? 'selected' : '' ?> value="northCentral">North Central</option>
                            <option <?= ($prev->province == "northern") ? 'selected' : '' ?> value="northern">Northern</option>
                            <option <?= ($prev->province == "northWestern") ? 'selected' : '' ?> value="northWestern">North Western</option>
                            <option <?= ($prev->province == "sabaragamuwa") ? 'selected' : '' ?> value="sabaragamuwa">Sabaragamuwa</option>
                            <option <?= ($prev->province == "southern") ? 'selected' : '' ?> value="southern">Southern</option>
                            <option <?= ($prev->province == "uva") ? 'selected' : '' ?> value="uva">Uva</option>
                            <option <?= ($prev->province == "western") ? 'selected' : '' ?> value="western">Western</option>
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
                        <input value="<?= $prev->address1 ?>" type="text" name="address1" required>
                        <i><?= (array_key_exists('address1', $errors)) ? $errors['address1'] : '' ?></i>
                    </div>
                    <div class="input-box <?= (!empty($errors['address2'])) ? 'error' : '' ?>">
                        <label for="address2">Address line 02</label>
                        <input value="<?= $prev->address2 ?>" type="text" name="address2" required>
                        <i><?= (array_key_exists('address2', $errors)) ? $errors['address2'] : '' ?></i>
                    </div>
                </div>

                <div  class="group password">
                    <div class="input-box password-field <?= (!empty($errors['password'])) ? 'error' : '' ?>">
                        <label for="password">Password</label>
                        <input onkeyup="trigger_password()" type="password" name="password" id="password-input" required>
                        <span class="show-btn show">
                                <img>
                            </span>
                        <i><?= (array_key_exists('password', $errors)) ? $errors['password'] : '' ?></i>
                    </div>

                    <!-- Password Strength Indicator -->
                    <div class="group">
                        <div class="ps-indicator-container">
                            <div class="ps-indicator">
                                <span class="weak"></span>
                                <span class="medium"></span>
                                <span class="strong"></span>
                            </div>
                            <span class="ps-text"></span>
                        </div>
                    </div>

                    <div class="input-box password-field <?= (!empty($errors['confirmPass'])) ? 'error' : '' ?>">
                        <label for="confirmPass">Confirm Password</label>
                        <input type="password" name="confirmPass" required>
                        <span class="show-btn">SHOW</span>
                        <i><?= (array_key_exists('confirmPass', $errors)) ? $errors['confirmPass'] : '' ?></i>
                    </div>
                </div>

                <div class="group">
                    <div class="input-box <?= (!empty($errors['packages'])) ? 'error' : '' ?>">
                        <label for="packages">Packages</label>
                        <input type="text" name="packages">
                        <i></i>
                    </div>
                    <div class="input-box <?= (!empty($errors['location'])) ? 'error' : '' ?>">
                        <label for="location">Location</label>
                        <input type="text" name="location">
                        <i></i>
                    </div>
                </div>

                <div class="terms-div">
                    <input type="checkbox" name="terms" id="terms" required>
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
                <button type="submit">Signup</button>
                <a href="<?= ROOT ?>/signup" class="blue-btn" style="color: white">Back</a>
            </form>
        </div>

        <div class="login right-section">
            <img id="signup-right-image" src="<?= ROOT ?>/assets/images/icons/auth/band.jpg" alt="signup">
        </div>
    </main>

    <script src="<?= ROOT ?>/assets/scripts/components/password_strength.js" defer></script>
    <script>
        const user_type = document.getElementById('user_type')
        const singer_box = document.getElementById('singer-box')
        const band_box = document.getElementById('band-box')
        const side_image = document.getElementById('signup-right-image')

        // City data for each province
        const cityData = {
            northern: ["Jaffna", "Kilinochchi", "Manner", "Mullaitivu", "Vavuniya"],
            northWestern: ["Puttalam", "Kurunegala"],
            western: ["Colombo", "Gampaha", "Kalutara"],
            northCentral: ["Anuradhapura", "Polonnaruwa"],
            central: ["Kandy", "Nuwara Eliya", "Matale"],
            sabaragamuwa: ["Kegalle", "Ratnapura"],
            eastern: ["Trincomalee", "Batticaloa", "Ampara"],
            uva: ["Badulla", "Monaragala"],
            southern: ["Hambantota", "Matara", "Galle"]
        };

        // Function to update the district options based on the selected province
        function updateDistrict() {

            const provinceSelect = document.getElementById("province")
            const districtSelect = document.getElementById("district")

            districtSelect.innerHTML = ""

            // Currently selected district
            let currentDistrict = "<?= ($prev->district) ? ucfirst(strtolower($prev->district)) : '' ?>"

            const selectedProvince = provinceSelect.value

            const districts = cityData[selectedProvince]

            if (districts) {
                districts.forEach(district => {
                    const option = document.createElement("option")
                    option.value = district
                    option.textContent = district

                    // Selecting the currently selected district
                    if(currentDistrict === district) option.selected = true

                    districtSelect.appendChild(option)
                });
            } else {
                const option = document.createElement("option")
                option.textContent = "No cities available"
                districtSelect.appendChild(option)
            }
        }

        updateDistrict()

    </script>

</div>
</body>

</html>